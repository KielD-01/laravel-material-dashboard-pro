@extends('mdp::layouts.user.auth-v1')
@section('mdp::pageTitle')
    {{ __('mdp.auth.sign_in') }}
@endsection

@section('mdp::content')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form class="form" action="{{ route('kield01.mdp.user.auth') }}" method="POST">
                @csrf
                <div class="card card-login">
                    <div class="card-header card-header-rose text-center">
                        <h4 class="card-title">@lang('mdp.forms.user.labels.sign_in')</h4>
                    </div>
                    <div class="card-body ">
                        <span class="bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">email</i>
                                    </span>
                                </div>
                                <input type="email" value="{{ old('email') }}" class="form-control"
                                       placeholder="@lang('mdp.forms.user.sign_in.placeholders.email')">
                            </div>
                        </span>

                        <span class="bmd-form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input type="password" class="form-control"
                                       placeholder="@lang('mdp.forms.user.sign_in.placeholders.password')">
                            </div>
                        </span>
                    </div>
                    <div class="card-footer justify-content-center">
                        <button class="btn btn-primary btn-link" type="submit">
                            @lang('mdp.forms.user.labels.submit')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
