<x-layouts.main-layout>
    <div class="container">
        <div class="row">
            <div class="col">                
                <ul class="display-6">
                    @guest
                        <li><a href="{{ route("login") }}">Login</a></li> 
                    @else
                        @can("user_is_admin")
                            <li><a href="{{ route("only_admin") }}">Só admins</a></li>
                        @endcan

                        @can('user_is_user')
                            <li><a href="{{ route("only_user") }}">Só usuários</a></li>
                        @endcan
                        
                        @can('user_can', "delete")
                            <li><a href="{{ route("delete") }}">Eliminar</a></li>
                        @endcan  
                    @endguest               
                </ul>                
            </div>
        </div>

        <div class="row">
            <div class="col">
                @can('user_is_admin')
                    <p>ADMIN</p>
                @endcan

                @can("user_is_admin")
                    <p>ADMIN</p>
                @else
                    <p>Outro!...</p>
                @endcan

                @cannot('user_is_admin')
                    <p>OK</p>
                @endcannot

                @canany(['user_is_admin', 'user_is_user'])
                    <P>Olá!</P>
                @endcanany

                <hr>

                @can('user_can_insert')
                    <p>Usário pode inserir</p>               
                @endcan

                @can('user_can_delete')
                    <p>Usário pode apagar</p>               
                @endcan

                @can('user_can_update')
                    <p>Usuário pode atualizar</p>               
                @endcan

                <hr>

                @can('user_can', 'update')
                    <p>Usuário pode atualizar</p>
                @endcan

                @can('user_can', 'insert')
                    <p>Usuário pode inserir</p>
                @endcan

                @can('user_can', 'delete')
                    <p>Usuário pode apagar</p>
                @endcan

                @can('user_can', 'select')
                    <p>Usuário pode visualizar</p>
                @endcan
            </div>
        </div>

    </div>
</x-layouts.main-layout>
