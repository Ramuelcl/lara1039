<?php

namespace App\Livewire\Users;

use Livewire\{WithPagination, Component};
use App\Models\User;

class LwMuestraUsuarios extends Component
{
    use WithPagination; // protected $paginationTheme = 'bootstrap';

    public $collectionView = 5,
        $collectionViews = ['5', '15', '25', '50'];

    // elemento de busqueda
    public $bSearch;
    public $search;

    // elemento activo
    public $bActive;
    public $activeAll;

    // elemento roles
    public $bRoles = true;
    public $roles;

    // orden y filtro
    public $sortField = 'id',
        $sortDir = 'asc',
        $icon = '';
    // campos por los cuales ordenar
    public $fieldsOrden = ['id', 'name', 'email'];
    public $nameOrden = ['id', 'Nombre', 'e-Mail'];

    // campos de la tabla
    public $user_id;
    public $name;
    public $email;
    public $is_active;
    public $profile_photo_path;
    public $old_photo_path;
    public $password;
    public $password_confirm;

    public $display = [
        'title' => 'Usuarios',
        'caption' => 'Roles',
        'clear' => 'Clear',
        'no records' => 'No records to show',
        'created' => 'creado...',
        'edited' => 'editado...',
        'deleted' => 'borrado...',
        'new' => 'Crear',
        'save' => 'Guardar',
        'actions' => 'Acciones',
        'delete' => 'Borrar',
        'edit' => 'Editar',
        'search' => 'Buscar...',
        'actives' => 'Actives?',
        'roles' => 'Roles',
    ];
    public $fields = [
        //0
        'id' => [
            'name' => 'id',
            'input' => ['type' => 'text', 'label' => 'Id', 'display' => false, 'disabled' => true],
            'table' => ['titre' => 'id', 'display' => true, 'disabled' => true],
        ],
        //1
        'name' => [
            'name' => 'name',
            'input' => ['type' => 'text', 'label' => 'Nombre', 'display' => true, 'disabled' => false],
            'table' => ['titre' => 'Nombre', 'display' => true, 'disabled' => false],
        ],
        //2
        'email' => [
            'name' => 'email',
            'input' => ['type' => 'mail', 'label' => 'eMail', 'display' => true, 'disabled' => false],
            'table' => ['titre' => 'Mail', 'display' => true, 'disabled' => false],
        ],
        //3
        'is_active' => [
            'name' => 'is_active',
            'input' => ['type' => 'checkit', 'label' => 'Activo ?', 'display' => true, 'disabled' => false],
            'table' => ['titre' => 'Activo', 'display' => true, 'disabled' => false],
        ],
        //4
        'profile_photo_path' => [
            'name' => 'profile_photo_path',
            'input' => ['type' => 'text', 'label' => 'Photo', 'display' => true, 'disabled' => false],
            'table' => ['titre' => 'Photo', 'display' => true, 'disabled' => false],
        ],
        //5
        'role' => [
            'name' => 'role',
            'input' => ['type' => 'text', 'label' => 'Rol', 'display' => true, 'disabled' => true],
            'table' => ['titre' => 'Roles', 'display' => true, 'disabled' => true],
        ],
    ];

    public function render()
    {
        $users = $this->updatedQuery();
        return view('livewire.users.lw-muestra-usuarios', [
            'users' => $users,
        ]);
    }
    public function fncOrden($sortField = 'id')
    {
        if ($sortField == null) {
            return;
        }
        // dd($sortField);
        if ($this->sortField == $sortField) {
            $this->sortDir = $this->sortDir == 'desc' ? 'asc' : 'desc';
        } else {
            $this->sortField = $sortField;
            $this->sortDir = 'asc';
        }
        $this->updatedQuery();
    }

    public function updatedQuery()
    {
        $collection = User::where('id', '>', 0)

            ->when($this->search, function ($query) {
                $srch = "%$this->search%";
                return $query
                    ->where('id', 'like', $srch)
                    ->orWhere('name', 'like', $srch)
                    ->orWhere('email', 'like', $srch);
                // filtrando por un campo de otra tabla
                // ->whereColumn('direccion.ciudad', 'like', $srch)
            })

            ->when($this->sortField || $this->sortDir, function ($query) {
                if ($this->sortField === 'field') {
                    // campo a filtrar
                    // otro campo de otra tabla anexa
                    // return $query->orderBy(User::with('roles')->get(), $this->sortDir);
                    // otra opcion
                    // return $query->orderBy(Apellido::select('lastname')
                    // ->whereColumn('apellidos.user.id', 'users.id'), $this->sortDir);
                } else {
                    return $query->orderBy($this->sortField, $this->sortDir);
                }
            });

        // ->when($this->roles, function ($query) {
        //     // $srch = "%$this->search%";
        //     // dd($this->roles);
        //     return $query->role($this->roles);
        // })

        // ->when($this->activeAll, function ($query) {
        //     return $query->active($query);
        // })

        $collection = $collection->paginate($this->collectionView);
        return $collection;
        $this->fncTotalRegs();
        // $this->permisos = Permission::all();
    }

    public function fncSearch($search)
    {
        $this->search = $search;
        // $this->render();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
