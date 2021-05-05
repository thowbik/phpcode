<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <style>
            *{
                padding:0;
                margin:0;
                font-family: 'Roboto', sans-serif;
            }
            body{
                
            }
            a,h4{
                color: #32c5d2;
            }
            p{
                color: #a2abb7;
            }
            .background{
                text-align:center;
                width: 50%;
                background:#ffffff;
                margin-left: auto;
                margin-right: auto;
                display: block;
            }
            div.a {
                text-align: justify;
            }
        
            div.foot{
                display:block;
                position: relative;
                width: 100%;
                box-sizing: border-box;
                background-color: #48525e;
                color: #fff;
                margin: 15% 0;
            }
            .about,.contact,.follows{
                padding: 2%;
                display: inline-block;
            }
            
            ul{
               display: block;    
            }
            li{
                display:inline-block;
                padding: 1px;
            }
            
            
        </style>   
    </head>
    <!-- END HEAD -->
    <body>
        <div class="background">
            <img src="<?php echo base_url().'asset/pages/img/emis_logo.png';?>" alt="tnlogo" height="80" />
        </div>
        <div class="a">
            <?php echo $name; ?> request to forgotten password is accepted.Check the below link.Thank You
            <dl>
                <?php if($url == 'localhost' || $url == '13.232.216.80'){ ?> <dt><b></b></dt>
                <dd> - <?php echo "http://emis1.s3-website.ap-south-1.amazonaws.com/reset-password/".$user; ?></dd>
                <?php }else if($url == 'emis1.tnschools.gov.in'){ ?>
                <dt><b></b></dt>
                <dd> - <?php echo "https://emis.tnschools.gov.in/reset-password/".$user; ?></dd>
                <?php } ?>
            </dl>
        </div>
        <div class="foot">
            <footer>
                <div class="about" style="width: 30%;">
                    <h4>ABOUT</h4>
                    <p> Portal for State Educational Management Information System Cell </p>
                </div>
                
                
                <div class="contact" style="width: 31%;padding: 2% 5%;">
                    <h4>Follow Us On</h4>
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/EMIS-Tamilnadu-Info-788395421347426/"  target="_blank"><img src="<?php echo base_url().'/asset/global/plugins/socicon/png/facebook.png'?>" width="32" height="32" alt="facebook"/></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/EMIS_TAMILNADU" target="_blank"><img src="<?php echo base_url().'/asset/global/plugins/socicon/png/twitter.png'?>" alt="twitter" width="32" height="32"/></a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/u/0/+EMISTAMILNADU" target="_blank"><img src="<?php echo base_url().'/asset/global/plugins/socicon/png/google.png'?>" alt="google" width="32" height="32"/></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UCg3zS41o26ZADy3HF-Di1Zw"  target="_blank"><img src="<?php echo base_url().'/asset/global/plugins/socicon/png/youtube.png'?>" alt="youtube" width="32" height="32"/></a>
                        </li>
                    </ul>
                   
                    
                </div>
                <div class="follows" style="width: 20%;">
                    <h4>Contacts</h4>
                     
                    <address class="margin-bottom-40"> <br> Email:
                        <a href="mailto:info@metronic.com">tnemiscel@gmail.com</a><br /><br />
                        <a href="https://www.facebook.com/tnschools" target="_blank">FACEBOOK OFFICIAL WORKSPACE</a>
                    </address>
                </div>
                
            </footer>
        </div>   
    </body>
</html>
