$('#quoteFormId').submit(function(event) {
	    event.preventDefault();
	    var author = $('#author').val();
	    var source = $('#source').val();
	    var quote = $('#quote').val();
	    var isPhilosophical;
	    if ($('#isPhilosophical').prop("checked")) {
	    	isPhilosophical = 1;
	    }
	    else{
	    	isPhilosophical = 0;
	    }

	    var isMotivational;
	    if ($('#isMotivational').prop("checked")) {
	    	isMotivational = 1;
	    }
	    else{
	    	isMotivational = 0;
	    }

	    var isFunny;
	    if ($('#isFunny').prop("checked")) {
	    	isFunny = 1;
	    }
	    else{
	    	isFunny = 0;
	    }

	    var isLove;
	    if ($('#isLove').prop("checked")) {
	    	isLove = 1;
	    }
	    else{
	    	isLove = 0;
	    }

	    var isPoetry;
	    if ($('#isPoetry').prop("checked")) {
	    	isPoetry = 1;
	    }
	    else{
	    	isPoetry = 0;
	    }

	    var isOther;
	    if ($('#other').prop("checked")) {
	    	isOther = 1;
	    }
	    else{
	    	isOther = 0;
	    }

	    if (isOther==1) {
	    	var otherCategory = $('#otherCategory').val();
	    }
	    var text_color;
	    if (document.getElementById('quotePreview').className == "card p-3 text-black") {
	    	text_color = "black";
	    }
	    else{
	    	text_color = "white";
	    }
	    
	    let getColorDiv = document.getElementsByClassName('pcr-button');
	    let rgbVal = getColorDiv[0].style.color;
	    console.log("Hello");
	    $.post(
	    	

	    	'publishQuote.php', 
	    	{
	        	'author' : author,
	        	'source' : source,
	        	'quote' : quote,
	        	'isPhilosophical' : isPhilosophical,
	        	'isMotivational' : isMotivational,
	        	'isFunny' : isFunny,
	        	'isLove' : isLove,
	        	'isPoetry' : isPoetry,
	        	'isOther' : isOther,
	        	'otherCategory' : otherCategory,
	        	'text_color' : text_color,
	        	'rgbVal' : rgbVal,
	        	

	    }, function(result) {
		console.log(result);
	        if(!result=="success") {
	           alert("We were unable to publish your quote, try again later"); 
	        } else {
	           window.location.href = "http://ecs.fullerton.edu/~cs431s22/project/quoteCreated.php";

	        }
	    });
	
	    console.log(values);




  });

  $('#loginForm').submit(function(event) {
	
	var username = $('#username').val();
	var password = $('#password').val();
	alert(password);
	$.post(
	    	

	    	'check_credentials.php', 
	    	{
	        	'username' : username,
	        	'password' : password,
	        	

	    }, function(result) {
		console.log(result);
	        if(!result=="success") {
	            alert("There was an error logging you in.");
	        } else {
	            

	        }
	    });

  });



  var searchFunc = function(event) {
	
	var isPhilosophical;
	if ($('#philoCheck').prop("checked")) {
        	isPhilosophical = 1;
        }
        else{
                isPhilosophical = 2;
        }

        var isMotivational;
        if ($('#motivCheck').prop("checked")) {
                isMotivational = 1;
        }
        else{
                isMotivational = 2;
        }

        var isFunny;
        if ($('#funnyCheck').prop("checked")) {
                isFunny = 1;
        }
        else{
                isFunny = 2;
        }

        var isLove;
        if ($('#loveCheck').prop("checked")) {
                isLove = 1;
        }
        else{
                isLove = 2;
        }

        var isPoetry;
        if ($('#poetryCheck').prop("checked")) {
                isPoetry = 1;
        }
        else{
                isPoetry = 2;
        }
	var isOther;
        if ($('#otherCheck').prop("checked")) {
                isOther = 1;
        }
        else{
        	isOther = 2;
        }
	var searchTerm = $('#searchTerm').val();
	let values = [isPhilosophical, isMotivational, isFunny, isLove, isPoetry, isOther];
	console.log(values);
	$.post(


                'search_quotes.php',
                {
                        'searchTerm' : searchTerm,
                        'isPhilosophical' : isPhilosophical,
                        'isMotivational' : isMotivational,
                        'isFunny' : isFunny,
                        'isLove' : isLove,
                        'isPoetry' : isPoetry,
                        'isOther' : isOther,
                        

            }, function(result) {
		var quotes = JSON.parse(result);
		console.log(quotes);
		if(true)
		{
			document.getElementById("quoteResults").innerHTML = "";
			for(i = 0; i < quotes.length; i++){
			var quote = $('<div id="quote" style="background-color: '+quotes[i].rgbVal+'" class="card p-4 text-'+quotes[i].text_color+'">'+
					'<blockquote class="blockquote mb-0 card-body">'+
					'<p id="quoteText">"'+quotes[i].quote+'"</p>' +
					'<footer>' +
					'<small>-</small>'+
					'<small id="authorText">' +quotes[i].author+ '</small>'+
					'<small>, <cite id="sourceText" title="Source Title">'+quotes[i].source+'</cite></small>'+
					'</footer>' +
					'</blockquote>'+
					'</div>');
			$('#quoteResults').append(quote);
			}
			
		}
		else{
			alert("BAD");
		}
		
                
            });




  };
  $('#searchTerm').keyup(searchFunc);
  $('#philoCheck').click(searchFunc);
  $('#motivCheck').click(searchFunc);
  $('#funnyCheck').click(searchFunc);
  $('#loveCheck').click(searchFunc);  
  $('#poetryCheck').click(searchFunc);
  $('#otherCheck').click(searchFunc);
  
  
  function textColorToBlack() {
    document.getElementById('quotePreview').className = "card p-3 text-black";
  }
  function textColorToWhite() {
    document.getElementById('quotePreview').className = "card p-3 text-white";
  }
  
  function updateQuoteText(quote){
  	if (quote.value.length>300) {
  		document.getElementById('quoteCard').style.maxWidth = "70%";
  	}
  	else{
  		document.getElementById('quoteCard').style.maxWidth = "30%";
  	}
    document.getElementById('quoteText').innerHTML = "\"" + quote.value + "\"";
  }
  function updateAuthorText(author){
    document.getElementById('authorText').innerHTML = author.value;

  }
  function updateSourceText(source){
  	if (source.value) {
  		document.getElementById('sourceVisible').className = "px--1";
  	}
  	else{
  		document.getElementById('sourceVisible').className = "d-none";
  	}
    document.getElementById('sourceText').innerHTML = source.value;
  }

   function isOther(checkbox) {
   	if (checkbox.checked == true) {
   		document.getElementById('otherCategory').className = "form-control";
   	}
   	else{
   		document.getElementById('otherCategory').className = "d-none";
   	}
   	
  }
