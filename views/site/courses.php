<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
  
<div class="section group">
          <div class="col span_1_of_2">
            <a href="#" class="btn btn-success btn-lg">
              <span class="glyphicon glyphicon-book"></span> Reading
            </a>
          </div>
          <div class="col span_1_of_2">
            <a href="#" class="btn btn-primary btn-lg">
              <span class="glyphicon glyphicon-pencil"></span> Writing
            </a>
          </div>          
</div>
<div class="section group">
          <div class="col span_1_of_2">
             <a href="#" class="btn btn-info btn-lg">
              <span class="glyphicon glyphicon-headphones"></span> Listening
              </a>
          </div>

          <div class="col span_1_of_2">
            <a href="#" class="btn btn-warning btn-lg">
              <span class="glyphicon glyphicon-comment"></span> Speaking
            </a>
          </div>          
</div>




<style>

/*  SECTIONS  ============================================================================= */

.section {
  clear: both;
  padding: 0px;
  margin: 0px;
  text-align: center;  
}

/*  GROUPING  ============================================================================= */


.group:before,
.group:after {
    content:"";
    display:table;
}
.group:after {
    clear:both;
}
.group {
    zoom:1; /* For IE 6/7 (trigger hasLayout) */
}

/*  GRID COLUMN SETUP   ==================================================================== */

.col {
  display: block;
  float:left;
  margin: 1% 0 1% 1.6%;
}

.col:first-child { margin-left: 0; } /* all browsers except IE6 and lower */


/*  REMOVE MARGINS AS ALL GO FULL WIDTH AT 480 PIXELS */

@media only screen and (max-width: 480px) {
  .col { 
    margin: 1% 0 1% 0%;
  }
}

/*  GRID OF TWO   ============================================================================= */


.span_2_of_2 {
  width: 100%;
}

.span_1_of_2 {
  width: 49.2%;
}

/*  GO FULL WIDTH AT LESS THAN 480 PIXELS */

@media only screen and (max-width: 480px) {
  .span_2_of_2 {
    width: 100%; 
  }
  .span_1_of_2 {
    width: 100%; 
  }
}
</style>