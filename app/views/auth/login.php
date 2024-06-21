<body>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="my-5">
                                <img src="<?= BURL ?>/img /login.png" alt="" width="400px">
                                <p class="text-center "> <a href="<?= BURL ?>/auth/register">Create on Account</a></p>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center mb-5">
                                        <h1 class="h4 text-gray-900 mb-4 font-weight-bold text-uppercase">Sign In </h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group my-4 position-relative ">
                                            <i class="fa fa-envelope position-absolute " aria-hidden="true" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>
                                            <input type="email" class="form-control border-top-0 border-left-0 border-right-0 pl-5" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." />
                                        </div>
                                        <div class="form-group my-4 position-relative">
                                            <i class="fa fa-lock position-absolute" aria-hidden="true" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>
                                            <input type="password" class="form-control border-top-0 border-left-0 border-right-0 pl-5" id="exampleInputPassword" placeholder="Password" />
                                        </div>

                                        <a href="index.html" class="btn btn-primary w-25 p-2 my-2">
                                            Login
                                        </a>
                                        <hr />
                                        <div class="d-flex">
                                            <a href="index.html" class="btn btn-google mx-2">
                                                <i class="fab fa-google fa-fw"></i>
                                            </a>
                                            <a href="index.html" class="btn btn-facebook mx-2">
                                                <i class="fab fa-facebook-f fa-fw"></i>
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>