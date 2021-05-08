<x-guest-layout>
    <div class="login-box">
        <div class="logo">
            <a href="">Login</a>
            {{-- <small>Sungai Langsat</small> --}}
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="msg">
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" placeholder="email" name="email" :value="old('email')" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="remember" id="remember_me" class="filled-in chk-col-pink">
                            <label for="remember_me">Remember Me</label>
                        </div>

                        <div class="col-xs-4">
                            {{-- <button class="t" type="submit">SIGN IN</button> --}}
                            <x-jet-button class="ml-4 btn btn-block bg-pink waves-effec">
                                {{ __('Login') }}
                            </x-jet-button>
                        </div>
                    </div>
                    
            </form>

        </div>
    </div>
</div>
</x-guest-layout>
