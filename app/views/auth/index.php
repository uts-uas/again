<body>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                    <?php Flasher::flash()?>
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="my-5">
                                <img src="<?= BURL ?>/img/blogin.png" alt="" width="400px">

                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center mb-5">
                                        <h1 class="h4 text-gray-900 mb-4 font-weight-bold text-uppercase">Sign In </h1>
                                    </div>
                                    <form class="user" method="POST" action="<?= BURL ?>/auth/login">
                                        <div class="form-group my-4 position-relative ">
                                            <i class="fa fa-user position-absolute " aria-hidden="true" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>
                                            <input type="text" name="username" class="form-control border-top-0 border-left-0 border-right-0 pl-5" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Enter Username" />
                                        </div>
                                        <div class="form-group my-4 position-relative">
                                            <i class="fa fa-lock position-absolute" aria-hidden="true" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>
                                            <input type="password" name="password" class="form-control border-top-0 border-left-0 border-right-0 pl-5" id="exampleInputPassword" placeholder="Password" />
                                        </div>

                                        <input type="submit" class="btn btn-primary w-25 p-2 my-2" value="login" />
                                            
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