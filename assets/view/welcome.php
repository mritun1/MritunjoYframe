<?php global $page_arr; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_arr['title']; ?></title>

    <meta name="description" content="<?php echo $page_arr['description']; ?>" />
    <meta name="keywords" content="<?php echo str_replace(" ",",",$page_arr['title']); ?>" />

    <!-- Facebook, whatsapp, instagram, twitter and other popular social media -->
    <meta property="og:title" content="<?php echo $page_arr['title']; ?>"> 
    <meta property="og:description" content="<?php echo $page_arr['description']; ?>">
    <meta property="og:image" content="https://localnii.com/assets/icons/main/profile.jpg">
    <meta property="og:url" content="https://localnii.com<?php echo $_SERVER['REQUEST_URI']; ?>">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Some Non-essential but recommended -->
    <meta property="og:site_name" content="Localnii.com"> <!-- Optional -->
    <meta name="twitter:image:alt" content="LOCALNII"> <!-- Optional -->

    <link rel="stylesheet" href="/assets/css/style.css?v=1.0.9" />
    <link rel="shortcut icon" href="https://localnii.com/assets/icons/main/profile.jpg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <?php config::include('404.404'); ?>

    
</body>
</html>

<script src="/assets/js/style.js?v=1"></script>
<script src="/assets/js/library.js?v=6.6"></script>