<x-admin-layout>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf

        <a class="btn btn-danger" :href="route('admin.logout')"
                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
            {{ __('Log Out') }}
        </a>
    </form>
    dashboard
</x-admin-layout>
