@extends('adminlte::page')

@section('content')
    @foreach ($roles as $role)
        <form method="post" action="{{ route('permission.store') }}">
            @csrf
            <input type="hidden" name="role_id" value="{{ $role->id }}">
            <h4>{{ ucfirst($role->name) }}</h4>
            @foreach ($permissions as $permission)
                <div><input type="checkbox" name="{{ $permission->name }}"
                    @if($role->permissions->contains($permission->id)) checked @endif
                    > {{ ucfirst(str_replace('_', ' ', $permission->name)) }}</div>
            @endforeach
            <button type="submit">Submit</button>
        </form>
    @endforeach
@endsection