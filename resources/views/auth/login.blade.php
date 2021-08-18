<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>CMA Saúde e Segurança do Trabalho</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('assets/css/pages/login/login-2.css?v=7.0.5') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css?v=7.0.5') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css?v=7.0.5') }}" rel="stylesheet"
        type="text/css" />
</head>

<body id="kt_body"
    class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">
    <div class="d-flex flex-column flex-root">
        <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white">
            <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
                <div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">
                    <div class="d-flex flex-column-fluid flex-column flex-center">

                        @error('alert')
                            <div class="alert alert-custom alert-outline-danger fade show mb-5" role="alert">
                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                <div class="alert-text">{{ $message }}</div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                    </button>
                                </div>
                            </div>
                        @enderror

                        <div class="login-form login-signin py-11">
                            <form action="{{ route('auth') }}" method="post"
                                class="form fv-plugins-bootstrap fv-plugins-framework" novalidate="novalidate"
                                id="kt_login_signin_form">
                                @csrf
                                <div class="text-center pb-8">
                                    <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Login</h2>
                                    <span class="text-muted font-weight-bold font-size-h4">
                                        <a href="" class="text-primary font-weight-bolder" id="kt_login_signup">Dados
                                            para acessar o portal.</a></span>
                                </div>
                                <div class="form-group fv-plugins-icon-container">
                                    <label class="font-size-h6 font-weight-bolder text-dark">E-mail</label>
                                    <input
                                        class="form-control form-control-solid h-auto py-7 px-6 rounded-lg @error('email') is-invalid @enderror"
                                        type="text" name="email" autocomplete="off">
                                    <div class="fv-plugins-message-container"></div>
                                    @error('email')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group fv-plugins-icon-container">
                                    <div class="d-flex justify-content-between mt-n5">
                                        <label class="font-size-h6 font-weight-bolder text-dark pt-5">Senha</label>
                                    </div>
                                    <input
                                        class="form-control form-control-solid h-auto py-7 px-6 rounded-lg @error('password') is-invalid @enderror"
                                        type="password" name="password" autocomplete="off">
                                    <div class="fv-plugins-message-container"></div>
                                    @error('password')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center pt-2">
                                    <button type="submit"
                                        class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3">Entrar</button>
                                </div>
                                <input type="hidden">
                                <div></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content order-1 order-lg-2 d-flex flex-column w-100 pb-0" style="background-color: #B1DCED;">
                <div
                    class="d-flex flex-column justify-content-center text-center pt-lg-40 pt-md-5 pt-sm-5 px-lg-0 pt-5 px-7">
                    <h3 class="display4 font-weight-bolder my-7 text-dark" style="color: #986923;">Portal
                    </h3>
                    <p class="font-weight-bolder font-size-h2-md font-size-lg text-dark opacity-70">CMA - Saúde e
                        Segurança Ocupacional</p>
                </div>

                <div class="content-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center"
                    style="background-image: url(assets/media/svg/illustrations/data-points.svg);"></div>
            </div>
        </div>
    </div>

</body>

</html>
