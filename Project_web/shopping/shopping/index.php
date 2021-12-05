<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>LaForge</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>

<body>
 
  <nav class="navbar navbar-expand-md bg-light navbar-light">
    <a class="navbar-brand" href="index.php"><i class="fas fa-seeds-alt"></i>&nbsp;&nbsp;LaForge Family's Seed Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
       <li class="nav-item">
          <a class="nav-link" href="http://localhost/shopping/"><i class="fas fa-house mr-2"></i>Home</a>
        </li>
       <li class="nav-item">
       <a class="nav-link" href="#1"><i class="fas fa-seeds-alt mr-2"></i>Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="checkout.php"><i class="fas fa-box-check-alt mr-2"></i>Checkout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="search.php"><i class="fas fa-search"></i> <span id="search" class="badge badge-danger"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user.php"><i class="fas fa-user"></i> <span id="user" class="badge badge-danger"></span></a>
        </li>
      </ul>
    </div>
  </nav>
  
  <link rel="stylesheet" href="style.css"/>
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  
<div class="swiper product-slider">

<section class="product" id="product">

    <h1 class="heading" id="heading"><span>BestSeller!!!</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper">

        <div class="swiper-slide box">
            <img src="image/14.jpg" alt="">
            <h3>Bearberry</h3>
            <div class="price"> $3.99 </div>
        </div>

        <div class="swiper-slide box">
            <img src="image/4.jpeg" alt="">
            <h3>Choke Cherry</h3>
            <div class="price"> $3.49</div>
        </div>

        <div class="swiper-slide box">
            <img src="image/10.jpg" alt="">
            <h3>Cranberry/ Partridgeberry</h3>
            <div class="price"> $2.49 </div>
        </div>


        <div class="swiper-slide box">
            <img src="image/7.jpeg" alt="">
            <h3>Labrador tea</h3>
            <div class="price"> $0.99 </div>
            </div>

        <div class="swiper-slide box">
            <img src="image/9.jpg" alt="">
            <h3>Northern Bedstraw</h3>
            <div class="price"> $0.99 </div>
        </div>
    
      </div>
   </div>
   </section>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="javscript.js"></script>


<section>

<h2 class= "header"><span>All Products</span> </h2>
<a name="1"></a>
  
  <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
  			include 'config.php';
  			$stmt = $conn->prepare('SELECT * FROM product');
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
  		?>
  
  <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="<?= $row['product_image'] ?>" class="card-img-top" height="250">
            <div class="card-body p-1">
              <h4 class="card-title text-center text-info"><?= $row['product_name'] ?></h4>
              <h5 class="card-text text-center text-danger"><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?></h5>

            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity : </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pqty" value="<?= $row['product_qty'] ?>">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <button class="btn btn-info btn-block addItemBtn">&nbsp;&nbsp;Add to
                  cart</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>

        </section>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

   
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });


    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });


</script>
</body>
</html>
