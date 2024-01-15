<div>
    @foreach ($users as $user)
        <div>
            {{ $user->name }}
        </div>
    @endforeach
    {{ $users->links() }}
</div>
