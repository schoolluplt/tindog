<x-app-layout>
<div class="min-h-screen bg-gray-900 mt-20">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  mt-4">

        <form action="{{route('send.email.to.users')}}" method="GET">
            @csrf
            @method('get')
            <x-primary-button type="submit">Send E-mail</x-primary-button>
        </form>
        <ul class="">
            @foreach($users as $user)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-6 ">
                    <li class="p-6 text-gray-900">
                        <a href="{{route('users.show', $user)}}"> {{$user->name}}</a>
                        @can('edit-users', $user)
                            <div class="flex">
                                <div>
                                    <form action="{{route('users.destroy', $user)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <x-primary-button type="submit">Delete</x-primary-button>
                                    </form>
                                </div>
                                <div>
                                    <form class="ml-3" action="{{route('users.edit', $user)}}" method="GET">
                                        @csrf
                                        @method('get')
                                        <x-secondary-button button type="submit" class="uk-button uk-button-primary">
                                            Edit User
                                        </x-secondary-button>
                                    </form>
                                </div>
                            </div>
                        @endcan
                        <br>
                    </li>
                </div>
            @endforeach
        </ul>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif
</div>
</x-app-layout>


