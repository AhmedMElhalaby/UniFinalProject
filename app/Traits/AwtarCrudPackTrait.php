<?php

namespace App\Traits;

use App\Http\Requests\AwtarCrudPack\DestroyRequest;
use App\Http\Requests\AwtarCrudPack\IndexRequest;
use App\Http\Requests\AwtarCrudPack\StoreRequest;
use App\Http\Requests\AwtarCrudPack\UpdatePasswordRequest;
use App\Http\Requests\AwtarCrudPack\UpdateRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

trait AwtarCrudPackTrait
{
    protected string $view_index = 'AwtarCrudPack.crud.index';
    protected string $view_show = 'AwtarCrudPack.crud.show';
    protected string $view_create = 'AwtarCrudPack.crud.create';
    protected string $view_edit = 'AwtarCrudPack.crud.edit';
    protected string $view_export = 'AwtarCrudPack.crud.export';
    protected string $redirect = '/';
    protected string $lang;
    protected string $entity;
    protected string $table;
    protected array $Columns = array();
    protected $Column;
    protected array $Fields = array();
    protected $Field;
    protected array $Links = array();
    protected $Link;
    protected array $Filters = array();
    protected $Filter;
    protected bool $create = true;
    protected bool $paging = true;

    public function __construct()
    {
        $this->setup();
    }

    public function setup(): void
    {

    }

    public function wrongData(): Redirector|Application|RedirectResponse
    {
        return redirect($this->getRedirect())->withErrors(__('admin.messages.wrong_data'));
    }

    public function getParams(): array
    {
        return [
            'redirect'=>$this->getRedirect(),
            'Columns'=>$this->getColumns(),
            'Fields'=>$this->getFields(),
            'lang'=>$this->getLang(),
            'Links'=>$this->getLinks(),
            'create'=>$this->isCreate(),
            'paging'=>$this->isPaging(),
        ];
    }

    public function index(IndexRequest $request): Factory|View|Application
    {
        return $request->preset($this);
    }

    public function create(): Factory|View|Application
    {
        return view($this->getViewCreate())->with($this->getParams());
    }

    public function store(StoreRequest $request): Redirector|RedirectResponse|Application
    {
        $validator = Validator::make($request->all(),$this->FieldsRules());
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        return $request->preset($this);
    }

    public function update(UpdateRequest $request, $id): Redirector|RedirectResponse|Application
    {
        $validator = Validator::make($request->all(),$this->FieldsRules(true,$id));
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        return $request->preset($this,$id);
    }

    public function show($id): Factory|View|Redirector|Application|RedirectResponse
    {
        $Object =(new ($this->getEntity()))->find($id);
        if(!$Object)
            return $this->wrongData();
        return view($this->getViewShow(),compact('Object'))->with($this->getParams());
    }

    public function edit($id): Factory|View|Redirector|Application|RedirectResponse
    {
        $Object = (new ($this->getEntity()))->find($id);
        if(!$Object)
            return $this->wrongData();
        return view($this->getViewEdit(),compact('Object'))->with($this->getParams());
    }

    public function updatePassword(UpdatePasswordRequest $request): Redirector|Application|RedirectResponse
    {
        $validator = Validator::make($request->all(),[
            'password' => 'required|max:255|confirmed|min:6',
            'id' => 'required|exists:'.$this->getTable().',id',

        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        return $request->preset($this);
    }
    public function destroy(DestroyRequest $request): Redirector|RedirectResponse|Application
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required|exists:'.$this->getTable().',id',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        return $request->run($this);
    }

    public static function Columns($column, $object): Factory|View|Application
    {
        return match ($column['type']) {
            'boolean' => view('AwtarCrudPack.base.columns.boolean', compact('column', 'object')),
            'paid' => view('AwtarCrudPack.base.columns.paid', compact('column', 'object')),
            'file' => view('AwtarCrudPack.base.columns.file', compact('column', 'object')),
            'select' => view('AwtarCrudPack.base.columns.select', compact('column', 'object')),
            'datetime' => view('AwtarCrudPack.base.columns.datetime', compact('column', 'object')),
            'relation' => view('AwtarCrudPack.base.columns.relation', compact('column', 'object')),
            'custom_relation' => view('AwtarCrudPack.base.columns.custom_relation', compact('column', 'object')),
            'active' => view('AwtarCrudPack.base.columns.active', compact('column', 'object')),
            'email' => view('AwtarCrudPack.base.columns.email', compact('column', 'object')),
            'text-custom' => view('AwtarCrudPack.base.columns.text-custom', compact('column', 'object')),
            'image' => view('AwtarCrudPack.base.columns.image', compact('column', 'object')),
            default => view('AwtarCrudPack.base.columns.default', compact('column', 'object')),
        };
    }

    public static function Links($link, $object, $redirect): Factory|View|Application
    {
        return match ($link) {
            'show' => view('AwtarCrudPack.base.links.show', compact('link', 'object', 'redirect')),
            'edit' => view('AwtarCrudPack.base.links.edit', compact('link', 'object', 'redirect')),
            'active' => view('AwtarCrudPack.base.links.active', compact('link', 'object', 'redirect')),
            'change_password' => view('AwtarCrudPack.base.links.change_password', compact('link', 'object', 'redirect')),
            'delete' => view('AwtarCrudPack.base.links.delete', compact('link', 'object', 'redirect')),
            default => (is_array($link) && $link['condition']($object)) ? view($link['view'] ?? 'AwtarCrudPack.base.links.custom', compact('link', 'object', 'redirect')) : view('AwtarCrudPack.base.links.empty'),
        };
    }

    public static function SearchAppends($Columns): array
    {
        $array = [
            'order_by' => request()->order_by,
            'order_type' => request()->order_type,
        ];
        foreach($Columns as $Column)
            if($Column['is_searchable']){
                $array[$Column['name']] = request($Column['name']);
            }
        return $array;
    }

    public static function SearchColumns($Column,$lang): Factory|View|Application
    {
        if($Column['is_searchable'])
            return match ($Column['type']) {
                'paid' => view('AwtarCrudPack.base.search.paid', compact('Column', 'lang')),
                'boolean' => view('AwtarCrudPack.base.search.boolean', compact('Column', 'lang')),
                'select' => view('AwtarCrudPack.base.search.select', compact('Column', 'lang')),
                'active' => view('AwtarCrudPack.base.search.active', compact('Column', 'lang')),
                'relation' => view('AwtarCrudPack.base.search.relation', compact('Column', 'lang')),
                'custom_relation' => view('AwtarCrudPack.base.search.custom_relation', compact('Column', 'lang')),
                'datetime' => view('AwtarCrudPack.base.search.datetime', compact('Column', 'lang')),
                'text-custom', 'text', 'email' => view('AwtarCrudPack.base.search.default', compact('Column', 'lang')),
                default => view('AwtarCrudPack.base.search.empty'),
            };
        else
            return view('AwtarCrudPack.base.search.empty');
    }

    public static function Fields($Field, $value,$lang): Factory|View|Application
    {
        return match ($Field['type']) {
            'file' => view('AwtarCrudPack.base.fields.file', compact('Field', 'value', 'lang')),
            'date' => view('AwtarCrudPack.base.fields.date', compact('Field', 'value', 'lang')),
            'time' => view('AwtarCrudPack.base.fields.time', compact('Field', 'value', 'lang')),
            'boolean' => view('AwtarCrudPack.base.fields.boolean', compact('Field', 'value', 'lang')),
            'url' => view('AwtarCrudPack.base.fields.url', compact('Field', 'value', 'lang')),
            'select' => view('AwtarCrudPack.base.fields.select', compact('Field', 'value', 'lang')),
            'select_enum' => view('AwtarCrudPack.base.fields.select_enum', compact('Field', 'value', 'lang')),
            'relation' => view('AwtarCrudPack.base.fields.relation', compact('Field', 'value', 'lang')),
            'custom_relation' => view('AwtarCrudPack.base.fields.custom_relation', compact('Field', 'value', 'lang')),
            'active' => view('AwtarCrudPack.base.fields.active', compact('Field', 'value', 'lang')),
            'datetime' => view('AwtarCrudPack.base.fields.datetime', compact('Field', 'value', 'lang')),
            'multi_checkbox' => view('AwtarCrudPack.base.fields.multi_checkbox', compact('Field', 'value', 'lang')),
            'textarea' => view('AwtarCrudPack.base.fields.textarea', compact('Field', 'value', 'lang')),
            'image' => view('AwtarCrudPack.base.fields.image', compact('Field', 'value', 'lang')),
            'images' => view('AwtarCrudPack.base.fields.images', compact('Field', 'value', 'lang')),
            'email' => view('AwtarCrudPack.base.fields.email', compact('Field', 'value', 'lang')),
            'added_by' => view('AwtarCrudPack.base.fields.added_by', compact('Field', 'value', 'lang')),
            'password' => view('AwtarCrudPack.base.fields.password', compact('Field', 'value', 'lang')),
            'number' => view('AwtarCrudPack.base.fields.number', compact('Field', 'value', 'lang')),
            default => view('AwtarCrudPack.base.fields.text', compact('Field', 'value', 'lang')),
        };
    }

    public function FieldsRules($update = false,$ref_id = null): array
    {
        $rules =[];
        foreach ($this->getFields() as $field) {
            $text = '';
            if($update && isset($field['editable']) && !$field['editable'])
                continue;
            if ($field['is_required'])
                if($update && isset($field['is_required_update']) && !$field['is_required_update'])
                    $text .= 'nullable';
                else
                    $text .= 'required';
            else
                $text .= 'sometimes';

            if ($field['type'] == 'text')
                $text .= '|max:255';

            if ($field['type'] == 'email')
                $text .= '|email|max:255';

            if ($field['type'] == 'password')
                $text .= '|max:255' . (isset($field['confirmation'])&&$field['confirmation']) ? '|confirmed' : '';

            if (isset($field['is_unique'])&&$field['is_unique']){
                if($update)
                    $text .= '|unique:' . $this->getTable().','. $field['name'].','.$ref_id;
                else
                    $text .= '|unique:' . $this->getTable();
            }
            if(isset($field['custom_rule'])){
                $text .= '|' . $field['custom_rule'];
            }
            $rules[$field['name']] =$text;
        }
        return $rules;
    }

    public function getViewIndex(): string
    {
        return $this->view_index;
    }

    public function setViewIndex(string $view_index): void
    {
        $this->view_index = $view_index;
    }

    public function getViewShow(): string
    {
        return $this->view_show;
    }

    public function setViewShow(string $view_show): void
    {
        $this->view_show = $view_show;
    }

    public function getViewCreate(): string
    {
        return $this->view_create;
    }

    public function setViewCreate(string $view_create): void
    {
        $this->view_create = $view_create;
    }

    public function getViewEdit(): string
    {
        return $this->view_edit;
    }

    public function setViewEdit(string $view_edit): void
    {
        $this->view_edit = $view_edit;
    }

    public function getViewExport(): string
    {
        return $this->view_export;
    }

    public function setViewExport(string $view_export): void
    {
        $this->view_export = $view_export;
    }

    public function getRedirect(): string
    {
        return $this->redirect;
    }

    public function setRedirect($redirect): void
    {
        $this->redirect = $redirect;
    }

    public function getLang()
    {
        return $this->lang;
    }

    public function setLang($lang): void
    {
        $this->lang = $lang;
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function setEntity($entity): void
    {
        $this->entity = $entity;
    }

    public function getColumns(): array
    {
        return $this->Columns;
    }

    public function setColumns(array $Columns): void
    {
        $this->Columns = $Columns;
    }

    public function getColumn()
    {
        return $this->Column;
    }

    public function setColumn($Column): void
    {
        $this->Column = $Column;
    }

    public function getFields(): array
    {
        return $this->Fields;
    }

    public function setFields(array $Fields): void
    {
        $this->Fields = $Fields;
    }

    public function getField()
    {
        return $this->Field;
    }

    public function setField($Field): void
    {
        $this->Field = $Field;
    }

    public function getLinks(): array
    {
        return $this->Links;
    }

    public function setLinks(array $Links): void
    {
        $this->Links = $Links;
    }

    public function getLink()
    {
        return $this->Link;
    }

    public function setLink($Link): void
    {
        $this->Link = $Link;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function setTable($table): void
    {
        $this->table = $table;
    }

    public function isCreate(): bool
    {
        return $this->create;
    }

    public function setCreate(bool $create): void
    {
        $this->create = $create;
    }

    public function getFilters(): array
    {
        return $this->Filters;
    }

    public function setFilters(array $Filters): void
    {
        $this->Filters = $Filters;
    }

    public function getFilter()
    {
        return $this->Filter;
    }

    public function setFilter($Filter): void
    {
        $this->Filter = $Filter;
    }

    public function isPaging(): bool
    {
        return $this->paging;
    }

    public function setPaging(bool $paging): void
    {
        $this->paging = $paging;
    }
}
