<?php 

    include 'lib/Database.php';
    include 'helpers/Format.php';
     

    spl_autoload_register(function($class){
    	include_once 'classes/'.$class.'.php';

    });

    $db   = new Database();
    $fm   = new Format();
    $pt   = new Post();
    $cat  = new Category();
    $us   = new User();
    


?>




<!DOCTYPE html>
<html>
<head>
	<?php 
        if (isset($_GET['page'])) {
        	$id = $_GET['page'];
        	$pageTitleById  =$pt->getPageById($id);
        	if ($pageTitleById) {
        		while ($result = $pageTitleById->fetch_assoc()) { ?>

        		<title><?php echo $result['name'];?> | <?php echo TITLE;?></title>
        	
        <?php }}}
            else if (isset($_GET['id'])) {
        	$id = $_GET['id'];
        	$postTitleById  =$pt->AllPostById($id);
        	if ($postTitleById) {
        		while ($result = $postTitleById->fetch_assoc()) { ?>

        		<title><?php echo $result['title'];?> | <?php echo TITLE;?></title>
        	
        <?php }}}



         else{?>

               <title><?php echo $fm->title();?> | <?php echo TITLE;?></title>
        	

       <?php }?>
	
	
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	 <?php 
	 if (isset($_GET['id'])) {
        	$id = $_GET['id'];
        	$keywordsid  =$pt->AllPostById($id);
        	if ($keywordsid) {
        		while ($result = $keywordsid->fetch_assoc()) { ?>

        		<meta name="keywords" content="<?php echo $result['tags'];?>">
        	
        <?php }} }else{?>

              <meta name="keywords" content="<?php echo KEYWORDS;?>">
        	

       <?php  }?>
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

	
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
			   
			<div class="logo">
				<?php 
			       $getTitleSlogan = $pt->getTitleSlogan();
			       if ($getTitleSlogan) {
			       	   while ($result = $getTitleSlogan->fetch_assoc()) {
			       

			   ?>
				<img src="admin/<?php echo $result['logo'] ;?>" alt="Logo"/>
				<h2><?php echo $result['title'] ;?></h2>
				<p><?php echo $result['slogan'] ;?></p>
				<?php  }}?>
			</div>
		
		</a>
		<div class="social clear">
			<div class="icon clear">
				<?php 
				   $getAllSocialMedia = $pt->socialmedia();
				   if ($getAllSocialMedia) {
				   	   while ($result = $getAllSocialMedia->fetch_assoc()) {
				   	
				?>
				
				<a href="<?php echo $result['facebook']?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $result['twitter']?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $result['linkdin']?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $result['google']?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php }}?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
     <?php
           $path = $_SERVER['SCRIPT_FILENAME'];
           $currentPage = basename($path, '.php');
      ?>
	<ul>
		<li><a <?php if ($currentPage == 'index') {echo "id='active'"; }?>
			 href="index.php">Home</a></li>
		                      <?php 
                                   $getPage =$pt->getPage();
                                   if ($getPage) {
                                       while ($result =$getPage->fetch_assoc()) {
                                    
                                ?>
                                <li><a 
                                	<?php 
                                	     if (isset($_GET['page']) && $_GET['page']== $result['id']) {
                                	     	echo "id='active'";
                                	     
                                	     }

                                	?>
                                 href="page.php?page=<?php echo $result['id'];?>"><?php echo $result['name'];?></a></li>
                            <?php }}?>
			
		<li><a <?php if ($currentPage == 'contact') {echo "id='active'"; }?> href="contact.php">Contact</a></li>
	</ul>
</div>