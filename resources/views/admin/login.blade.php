<x-admin-layout>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign in</h3>
                            <form action="{{ route('admin.login') }}" method="post">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">{{ __('Email') }}</label>
                                    <input type="email" id="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" />

                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                </div>

                                <!-- Checkbox -->
                                <div class="form-check text-start mb-4">
                                    <input class="form-check-input" type="checkbox"  id="remember_me" name="remember" />
                                    <label class="form-check-label" for="remember_me"> Remember password </label>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
