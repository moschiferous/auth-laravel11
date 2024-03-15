<x-app-layout>
    <h1>Logged IN</h1>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">logout</button>
    </form>
</x-app-layout>