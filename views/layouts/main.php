<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
   <header> 
       <div> 
          <div>                     
              <h1><a href="index.html"><img src="images/logo.png" alt=""></a></h1> 
              <nav>  
                <ul class="menu">
                      <!-- <li class="current"><?= Html::a('Home', ['/site/index']) ?></li> -->

                      <li><?= Html::a('Home', ['/site/index']) ?></li>
                      
                      <?php 
                      if(Yii::$app->user->can('student') && !Yii::$app->user->can('admin')){                        
                      ?>                                            
                        <li><?= Html::a('Courses', ['/site/courses']) ?></li>                      
                        <li><?= Html::a('IELTS', ['/site/ielts']) ?></li>                      
                      <?php } ?>

                      <?php 
                      if(Yii::$app->user->can('admin')){                        
                      ?>
                        <li><?= Html::a('Administration', ['/admin']) ?></li>                        
                      <?php } ?>
 
                      <li><?= Html::a('Community', ['/site/community']) ?></li>
                      <li><?= Html::a('Support', ['/site/contact']) ?></li>
                      
                      <?php 
                      if(Yii::$app->user->isGuest){                        
                      ?>                                            
                        <li><?= Html::a('Login', ['/site/login']) ?></li>                                                                 
                      <?php }else{ ?>
                        <li><?= Html::a('Logout', ['/site/logout'],['data-method'=>'post']) ?></li>   
                      <?php } ?>
                      
                  </ul>
              </nav>
              <div class="clear"></div>
          </div>
      </div>
    </header>  
    <!-- <div id="slide">
       <div class="slider">
          <ul class="items">
              <li><img src="images/slider-1.jpg" alt="" /><div class="banner"><p class="text-1">We've Got <strong>an Idea!</strong></p><p class="text-2">Ut wisi enim ahd minim veniam quis nostrud exerci takltion ulamc orper suscipit lobortis</p></div></li>
              <li><img src="images/slider-2.jpg" alt="" /><div class="banner"><p class="text-1">Here We <strong>Are!</strong></p><p class="text-2">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p></div></li>
              <li><img src="images/slider-3.jpg" alt="" /><div class="banner"><p class="text-1">Stay <strong>Creative!</strong></p><p class="text-2">Feugiat nulla facilisis at vero erots et accumsan et iusto odio dignis sim qui blandit.</p></div></li>
          </ul>
       </div>
    </div> -->

 <!--==============================content================================-->
    <section id="content">
      <div class="container_12">
         <?= $content ?>
      </div>
    </section> 


   <footer>
      <p>&copy; NIS <?= date('Y') ?><br> Powered by <a href="#">abzal.amantay@gmail.com</a>
      <div class="soc-icons"><span>Follow Us:</span><a href="#"><img src="images/icon-1.jpg" alt=""></a><a href="#"><img src="images/icon-2.jpg" alt=""></a><a href="#"><img src="images/icon-3.jpg" alt=""></a></div>
    </footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
