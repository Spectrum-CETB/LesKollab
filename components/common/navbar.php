<style>
      .swal-button--danger
      {
        background-color: #e64942 !important;
      }
      .swal-button--cancel
      {
        background-color: #efefef !important;
      }
      .swal-button--cancel:hover
      {
        color: black !important;
      }
    </style>
<section>
    <nav class="navbar navbar-light navbar-expand-md py-0" style="font-size: 20px;background: rgba(0,0,0,0.9);">
        <div class="container-fluid"><a class="navbar-brand " href="index.php" style="font-family: Aclonica, sans-serif;font-size: 30px;color: rgb(254,254,254);"><img src="../assets/images/logo_footer.png" alt="" height="80px" width="100px">LesKollab</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active" href="user_info.php" style="margin-right: 1vw;color: rgb(255,0,0);font-weight:bold;"><?= $name ?>&nbsp;<i class="fas fa-user"></i></a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg" href="#" style="color: rgb(197,189,0);margin-right: 1vw;font-weight:bold;">Post an Idea&nbsp;<i class="fas fa-lightbulb"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="confirmation()" style="color: rgb(255,255,251);margin-right: 1vw;font-weight:bold;">Logout&nbsp;<i class="fas fa-sign-out-alt"></i></a></li>
                </ul>
                <!-- <ul class="nav navbar-nav"></ul><button class="btn openBtn" onclick="openSearch()" style="color: rgb(255,255,255);"><i class="fa fa-search" style="color: rgb(255,255,255);"></i></button>-->
            </div>
        </div>
    </nav>
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function confirmation(){
    swal({
      title: "Are you sure?",
      text: "You Want to LogOut!!",
      icon: "warning",
      buttons: true,
      buttons: ['cancel','Yes, Log out'],
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "../logout.php";
      } else {
        
      }
    });
    }
  </script>