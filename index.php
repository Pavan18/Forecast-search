<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
		<script src="http://openlayers.org/api/OpenLayers.js"></script>
	
 <script  src="//connect.facebook.net/en_US/sdk.js"></script>
	 <script src="hw8Res/hw8script.js"></script>
	 <script src="hw8Res/moment.js"></script>
	 
	 <script src="hw8Res/moment-timezone-with-data.js"></script>
	 
    <link rel="stylesheet" href="hw8Res/hw8style.css" >
    <title>HW 8 - Weather Forecast</title>
  </head>

  <body>
<div id="fb-root"></div>
    <h1>
      <center>
        Forecast Search
      </center>
    </h1>
	
    <div class="container formback" >
	<center><div id="errorMsg" style="color:red;font-size:30px;"></div></center>
      <div class="row ">
        <form class="form-inline " id="weatherform" action="" class="JSONFrm" method="get" accept-charset="utf-8">
          <div class="form-group">
            <label for="inputAddress" class="whiteText">
              Street Address:<span class="redText"> *</span><!--red color to * -->
            </label>
            <br/>
            <input type="text" class="form-control"
              name="strAddr" id="inputAddress" placeholder="Enter street address">
          </div>
          <div class="form-group">
            <label
              for="inputCity" class="whiteText">City:<span class="redText"> *</span></label>
            <br/>
            <input type="text" class="form-control" name="city" 
              id="inputCity" placeholder="Enter the city name">
          </div>
          <div class="form-group">
            <label
              for="inputState" class="whiteText">State:<span class="redText"> *</span></label>
            <br/>
            <select class="form-control" id="inputState" name="state" >
              <option value="" selected="selected">--- Select a State ---</option>
              <option value='AL'>Alabama</option>
              <option value='AK'>Alaska</option>
              <option value='AZ'>Arizona</option>
              <option value='AR'>Arkansas</option>
              <option value='CA'>California</option>
              <option value='CO'>Colorado</option>
              <option value='CT'>Connecticut</option>
              <option value='DE'>Delaware</option>
              <option value='DC'>District Of Columbia</option>
              <option value='FL'>Florida</option>
              <option value='GA'>Georgia</option>
              <option value='HI'>Hawaii</option>
              <option value='ID'>Idaho</option>
              <option value='IL'>Illinois</option>
              <option value='IN'>Indiana</option>
              <option value='IA'>Iowa</option>
              <option value='KS'>Kansas</option>
              <option value='KY'>Kentucky</option>
              <option value='LA'>Louisiana</option>
              <option value='ME'>Maine</option>
              <option value='MD'>Maryland</option>
              <option value='MA'>Massachusetts</option>
              <option value='MI'>Michigan</option>
              <option value='MN'>Minnesota</option>
              <option value='MS'>Mississippi</option>
              <option value='MO'>Missouri</option>
              <option value='MT'>Montana</option>
              <option value='NE'>Nebraska</option>
              <option value='NV'>Nevada</option>
              <option value='NH'>New Hampshire</option>
              <option value='NJ'>New Jersey</option>
              <option value='NM'>New Mexico</option>
              <option value='NY'>New York</option>
              <option value='NC'>North Carolina</option>
              <option value='ND'>North Dakota</option>
              <option value='OH'>Ohio</option>
              <option value='OK'>Oklahoma</option>
              <option value='OR'>Oregon</option>
              <option value='PA'>Pennsylvania</option>
              <option value='RI'>Rhode Island</option>
              <option value='SC'>South Carolina</option>
              <option value='SD'>South Dakota</option>
              <option value='TN'>Tennessee</option>
              <option value='TX'>Texas</option>
              <option value='UT'>Utah</option>
              <option value='VT'>Vermont</option>
              <option value='VA'>Virginia</option>
              <option value='WA'>Washington</option>
              <option value='WV'>West Virginia</option>
              <option value='WI'>Wisconsin</option>
              <option value='WY'>Wyoming</option>
            </select>
          </div>
          <div class="form-group">
            <label class="whiteText">Degree:<span class="redText"> *</span></label>
            <br/>
            <input type="radio" name="temperature" id="Fahr" value="us" checked="checked"><span class="whiteText" style="font-size:1.1em;" > Fahrenheit</span>
            <input type="radio" name="temperature" value="si"><span class="whiteText" style="font-size:1.1em;"> Celsius</span>
            </select>
          </div>
          <div class="form-group col-xs-offset-3 col-sm-offset-5  col-lg-offset-1">
            <br/>
            <button type="submit"
              class="btn glyphicon btn-primary glyphicon-search" id="sub" >Search</button>
            
            <button type="reset"
              class="btn btn-default glyphicon glyphicon-refresh" onclick="resetWeatherForm();">Clear</button>
          </div>
        </form>
		 <div class="row">
		<div class="whiteText col-xs-offset-6  col-sm-offset-9 col-md-offset-10">Powered by:
		<a href="http://forcast.io" alt="Forecast IO" target="_blank"><img src="hw8Res/forecast_logo.png" style="width:60px;height:30px;" /></a>
		</div>
    </div>
      </div>
	  </div>
	 <br/>
	 <hr style="color:white;" width="92%"/>
	<div class="container">

	
  <ul class="nav nav-pills col-xs-12 col-md-12" >
  
    <li id ="maintab"  class="active" style="visibility: hidden;"><a data-toggle="pill" id="mainlink" href="#now" class="nav-tabs " onclick="GetJSONfromPHP(0);"><span style="font-size:14px;">Right Now</span></a></li>
    <li id ="twotab"  style="visibility: hidden;"><a data-toggle="pill" href="#thisday" class="nav-tabs" onclick="GetJSONfromPHP(1);"><span style="font-size:14px;">Next 24 Hours</span></a></li>
    <li id ="threetab" style="visibility: hidden;"><a data-toggle="pill" href="#thisweek" class="nav-tabs"  onclick="GetJSONfromPHP(2);"><span style="font-size:14px;">Next 7 Days</span></a></li>
  </ul>
  
  
  <br/>
  <br/>
  <div class="container  col-xs-12 col-md-12" >
  <div class="row">
  <div class="tab-content  " style="padding:0px; " id="maindiv">
  
    <div id="now" class="tab-pane fade in active">
  
      <div id="current" class="row col-xs-12 col-md-8"></div>
    </div>
    <div id="thisday" class="tab-pane fade " >
      
      <div id="day"  class="row col-xs-12 col-md-12"></div>
    </div>
    <div id="thisweek" class="container tab-pane fade">
      
      <div id="week"   ></div>
    </div>
  </div>
  



 
 
 
   <div  id="basicMap"  class="col-xs-4">

         </div>
		 </div >
		  </div>
		  </div>
</div>


     

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
  </body>
</html>