jQuery(document).ready(function ($) {

  var urlParams = new URLSearchParams(window.location.search);
  var name = urlParams.get("fencename");
  var color = urlParams.get("color");
  var style = urlParams.get('style');
  var product = null;
  var cart = [];
  var gatesConfig = [];
  var productFormData = {
    name: null,
    style: null,
    color: null,
  };
  var oldDrawingData = null;
  if (typeof (Storage) !== "undefined") {
    oldDrawingData = sessionStorage.getItem('drawingData');
    if (oldDrawingData) {
      oldDrawingData = JSON.parse(oldDrawingData);
    }
  }

  // send user to edit workflow based off of old drawing data
  if (urlParams.has('edit-drawing') && oldDrawingData && !name) {
    window.location.search = "?edit-drawing=true&name=" + oldDrawingData.name + "&style=" + oldDrawingData.style + "&color=" + oldDrawingData.color;
  }

  // change calculate button text if change type
  if (urlParams.has('change-type') && oldDrawingData) {
    $('#typeFormSubmit').html('RECALCULATE');
  }

  function setProduct() {
    switch (style) {
      case "vinyl":
        if (color == "null") {
          color = "White";
        }
        CONFIG.forEach(function (val) {
          if (val.Color === color && val.Name === name) {
            product = val;
          }
  
        });
        break;
      case "wood":
        var tmp = null;
        var colorFound = false;
        CONFIG.forEach(function (val) {
          if (val.Color === color && val.Name === name) {
            product = val;
            colorFound = true;
          }
          if (val.Name === name) {
            tmp = val;
          }
  
        });
        if (!colorFound) {
          product = tmp;
        }
        break;
      default:
        CONFIG.forEach(function (val) {
          if (val.Name === name) {
            product = val;
          }
        });
  
        break;
    }
  }

  

  setProduct();
  //setGateConfig();

  console.log(name);
  console.log(color);
  console.log(style);
  console.log(product);

  $("#spinner").hide();
  $("#main-content2").fadeIn(500);

  if (!product) {
    if (typeof (Storage) !== "undefined") {
      sessionStorage.setItem("calculator", "");
    }
    window.localStorage.setItem("step", "0");
    //$("#notAvailable").show();
    //$("#main-calculator").hide();
    var formTypes = [];
    var selectedType = "";
    var selectedStyle = "";
    var selectedHeight = "";
    var selectedColor = "";

    Object.keys(CALCULATOR_FORM).forEach(function (val) {
      formTypes.push({ id: val, text: val });
    });
    $("#form-type").select2({
      data: formTypes,
      placeholder: "Select a type",
      allowClear: true,
      width: "300px"
    });
    $('#form-type').on('select2:select', function (e) {
      var data = e.params.data;
      selectedType = data.id;
      selectedStyle = "";
      selectedHeight = "";
      selectedColor = "";
      productFormData.style = data.id;

      $('#form-style').empty();
      $('#form-style').append(new Option("", "", false, false));

      $('#form-height').empty();
      $('#form-height').append(new Option("", "", false, false));

      $('#form-color').empty();
      $('#form-color').append(new Option("", "", false, false));

      Object.keys(CALCULATOR_FORM[data.id]).forEach(function (val) {
        $('#form-style').append(new Option(val, val, false, false));
      });
    });

    $("#form-style").select2({
      placeholder: "Select a style",
      allowClear: true,
      width: "300px"
    });
    $('#form-style').on('select2:select', function (e) {
      var data = e.params.data;
      selectedStyle = data.id;
      selectedHeight = "";
      selectedColor = "";

      $('#form-height').empty();
      $('#form-height').append(new Option("", "", false, false));

      $('#form-color').empty();
      $('#form-color').append(new Option("", "", false, false));

      Object.keys(CALCULATOR_FORM[selectedType][selectedStyle]).forEach(function (val) {
        $('#form-height').append(new Option(val, val, false, false));
      });
    });

    $("#form-height").select2({
      placeholder: "Select a height",
      allowClear: true,
      width: "300px"
    });
    $('#form-height').on('select2:select', function (e) {
      var data = e.params.data;
      selectedHeight = data.id;

      $('#form-color').empty();
      $('#form-color').append(new Option("", "", false, false));

      var isEmpty = false;
      Object.keys(CALCULATOR_FORM[selectedType][selectedStyle][selectedHeight]).forEach(function (val) {
        if (val == "") {
          isEmpty = true;
          $('#form-color').empty();
          $('#form-color').append(new Option("No Color", "1", false, false));
          $('#form-color').attr('required', false);
          productFormData.name = CALCULATOR_FORM[selectedType][selectedStyle][selectedHeight][""];
          console.log(productFormData.name);
        }
        else if (val == "Black") {
          console.log('black');
          $('#form-color').empty();
          $('#form-color').append(new Option(val, val, false, false));
          $('#form-color').attr('required', false);
          console.log(productFormData.name);
          productFormData.name = CALCULATOR_FORM[selectedType][selectedStyle][selectedHeight]["Black"];
          console.log(productFormData.name);
        }
        else if (val == "Galvanized") {
          console.log('Galvanized');
          $('#form-color').empty();
          $('#form-color').append(new Option(val, val, false, false));
          $('#form-color').attr('required', false);
          console.log(productFormData.name);
          productFormData.name = CALCULATOR_FORM[selectedType][selectedStyle][selectedHeight]["Galvanized"];
          console.log(productFormData.name);
        }
        else {
          console.log('color unknown');
          $('#form-color').append(new Option(val, val, false, false));
          $('#form-color').attr('required', true);
          console.log(productFormData.name);
        }

      });
    });

    $("#form-color").select2({
      placeholder: "Select a color",
      allowClear: true,
      width: "300px"
    });
    $('#form-color').on('select2:select', function (e) {
      var data = e.params.data;
      productFormData.name = CALCULATOR_FORM[selectedType][selectedStyle][selectedHeight][data.id];
      productFormData.color = data.id;
    });


    $("#formCalculate").submit(function (e) {
      e.preventDefault();
      console.log(productFormData.style);
      if (productFormData.style == "Chain Link") {
        productFormData.style = "chain-link";
        //productFormData.color = "null";
      }
      if (productFormData.style == "Ornamental") {
        productFormData.style = "ornamental-iron";
      }

      if (urlParams.has('change-type') && oldDrawingData) {
        name = productFormData.name;
        style = productFormData.style.toLowerCase();
        color = productFormData.color;
        setProduct();
        setGateConfig();
        calculateDrawingTool(oldDrawingData.inventory, oldDrawingData.rawData);
      }
      else {
        //window.location.search = "?fencename=" + productFormData.name + "&style=" + productFormData.style.toLowerCase() + "&color=" + productFormData.color;    
        
        //console.log(productFormData.name);
        //data = productFormData.name;
        openDrawingTool();
        //window.open("/draw-your-fence-submission-form/" ,"_self");
        window.onmessage = (event) => {
          console.log('Received message');
          console.log(JSON.stringify(event.data));
          console.log('drawingPath = ' + event.data.drawingPath);

          if (event.data.drawingPath != undefined) {
            $("#main-calculator").hide();
            $("#gravity-form-submit").show();
            //$("#submitGravityForm").html(do_shortcode('[gravityform id=11 name=true title=false description=false ajax=true]'));
            $(".draw-my-fence-link").attr("href", event.data.drawingPath).prop('target', '_blank');
            $(".draw-my-fence-link input").prop('readonly', true).val(event.data.drawingPath);
            add_filter( 'gform_required_legend', '__return_empty_string' );
            //$(".draw-my-fence-link").attr("input", {value:event.data.drawingPath});

          }
        };
      } 
    return true;
    });

  return; 
  }

  // drawing tool functionality 
  var dtWindow = null;
  function openDrawingTool(data) {
    var windowName = window.location.href;
    if (dtWindow && !dtWindow.closed) {
      dtWindow.focus();
    }
    else {
      var urlBase = 'https://afpw.americafence.com/drawing-tool/';
      //var urlBase = 'https://afpw-test.volanohosting.com/drawing-tool/';
      //urlBase = 'http://localhost:8080';
      //dtWindow = window.open(urlBase + '?_mode=shopify', windowName, 'height=900,width=1400,top=0,left=0,resizable=0');
      dtWindow = window.open(urlBase + '?_mode=wordpress', windowName, 'height=900,width=1400,top=0,left=0,resizable=0');
    }
    // listen to drawing tool ready event
    const onReadyMessage = event => {
      if (event.data && event.data.type === 'ready') {

        if (data) {
          dtWindow.postMessage({
            type: 'load-drawing',
            data
          }, '*');
        }


        // This code passes ImageUrl to from CONFIG to dtWindow.postmessage to display on drawing
        var i = 0, len = CONFIG.length;
        while (i < len) {
            //console.log("CONFIG NAME IN ARRAY", CONFIG[i].Name);
              if (productFormData.name == CONFIG[i].Name) {  
              $ImageUrl = CONFIG[i].ImageUrl;
              //console.log("IMG LINK FROM CONFIG FILE", $ImageUrl);
            } 
            i++;
        }
        
        // console.log("Product IMG URL", ImageUrl);
        //if (product.ImageUrl) {
        if ($ImageUrl) {
          dtWindow.postMessage({
            type: 'load-image',
            //url: product.ImageUrl
            url: $ImageUrl
          }, '*');
        }
        window.removeEventListener('message', onReadyMessage);
      }
    }
    window.addEventListener('message', onReadyMessage);
  }

  // open the drawing tool window on button click

  $('#btn-start-drawing-tool').click(function () {
    openDrawingTool();
  });

  function calculateDrawingTool(inventory, rawData) {
    if (inventory && inventory.length > 0) {
      var fence = inventory[0];
      console.log('Drawing Tool Fence', fence);

      var calc = $('#calc-dt');
      calc.empty();
      // add length inputs for calculator
      fence.Segments.forEach(s => {
        var footageInput = $('<input>').attr({
          class: 'footage-input',
          value: s.Length
        });
        calc.append(footageInput);
      });
      // add post inputs for calculator
      fence.Posts.forEach(p => {
        var typeLookup = {
          endpost: 'End',
          cornerpost: 'Corner',
          blankpost: 'Blank',
          gatepost: 'Gate'
        };

        var type = typeLookup[p.PostType];
        if (type) {
          var select = $('<select>').attr({
            class: 'term-post-input'
          });
          var option = $('<option>').attr({
            value: type,
            selected: 'selected'
          });
          select.append(option);
          calc.append(select);
        }
      });

      // get gate ids from gateConfig
      var gateIds = fence.Gates.map(g => {
        var type = 'Single';
        if (g.Description.match('double')) {
          type = 'Double';
        }
        var config = { Key: type, Opening: g.Length };

        var configSearch = gatesConfig.filter(c => c.Key == type && c.Opening == g.Length);
        if (configSearch.length > 0) {
          config = configSearch[0];
        }
        return config;
      }).filter(g => undefined != g && null != g);

      gateIds.forEach(g => {
        var select = $('<select>').attr({
          class: 'fg-input'
        });
        var option = $('<option>').attr({
          value: g.Key,
          selected: 'selected',
          'data-id': g.ID
        });

        select.append(option);
        calc.append(select);
      });

      //console.log(calc);
      window.usedDrawingTool = true;
      var drawingData = {
        inventory,
        rawData,
        name,
        color,
        style
      };
      if (typeof (Storage) !== "undefined") {
        window.sessionStorage.setItem('drawingData', JSON.stringify(drawingData));
      }
      calculate();
    }
  }

  window.addEventListener('message', function (message) {
    var inventory = message.data.inventory;
    var rawData = message.data.rawData;
    calculateDrawingTool(inventory, rawData);
  });

  var oldCalculator = null;
  if (typeof (Storage) !== "undefined") {
    oldCalculator = sessionStorage.getItem("calculator");
  }

  //var startTmpl = Handlebars.compile($("#startTmpl").html());
  
    
    //$("#startSection").append(html)
    //if (product) {
     // $("#tool-selector").show();
      //$("#example").show();
     // $("#main-calculator").hide();
    //}

    $('#draw-visual').show();
  

  $('#btn-draw-fence').click(function () {
    $("#tool-selector").hide();
    $("#example-drawing-tool").show();
    $("#main-calculator").hide();
  });

  $('#btn-enter-fence').click(function () {
    $("#tool-selector").hide();
    $("#example").show();
    $("#main-calculator").hide();
  });


 

  var locState = window.localStorage.getItem("step");
  if (!locState) {
    locState = 0;
  }
  if (locState >= 3) {
    locState = 0;
    window.localStorage.setItem("step", locState);
  }
  function showElem(val) {
    $("#example").hide();
    $("#exampleInput").hide();
    $("#main-calculator").hide();
    $(val).show();
  }

  

  $("#btnStartCalculator").click(function (e) {
    $("#example").hide();
    $("#exampleInput").hide();
    $("#main-calculator").show();
    $("#formSection").hide();
    $("#startSection").show();
    $("#calcImg").show();
    $("html, body").animate({ scrollTop: 0 }, "slow");
    locState = 2;
    window.localStorage.setItem("step", locState);
    window.history.pushState({ step: "2" }, "");
    window.history.pushState({ step: "2" }, "");
  });

  $("#btnMyCalc").click(function (e) {
    $("#exampleInput").hide();
    $("#main-calculator").show();
    $("#formSection").hide();
    $("#startSection").show();
    $("#calcImg").show();
    $("html, body").animate({ scrollTop: 0 }, "slow");
    locState++;
    window.localStorage.setItem("step", locState);
    window.history.pushState({ step: "2" }, "");

  });

  window.addEventListener('popstate', function (e) {
    switch (parseInt(window.localStorage.getItem("step"))) {
      case 1:
        showElem("#example");
        window.locState--;
        locState--;
        window.localStorage.setItem("step", locState);
        break;
      case 2:
        showElem("#exampleInput");
        locState--;
        window.localStorage.setItem("step", locState);
        break;
    }
  });



  function onSelectChange(e) {
    var post = $(this).data("post");
    var value = $(this, "option:selected").val();
    if (value === "Single" || value === "Double") {
      $(".post-" + post).prop("disabled", true);
      //$(".term-post[data-post='"+(parseInt(post)+1)+"']").val("Gate").prop('selected', true).trigger('change');
    } else {
      $(".post-" + post).prop("disabled", false);
    }
  }

  function registerSelectHandlers() {
    $(".fg-input").on('change', onSelectChange);
  }

  function calculate(e) {
    $("input,select,textarea").each(function () {
      if ($(this).is("[type='checkbox']") || $(this).is("[type='checkbox']")) {
        $(this).attr("checked", $(this).attr("checked"));
      } else if ($(this).is("select")) {
        $(this).find(":selected").attr("selected", "selected");
      } else {
        $(this).attr("value", $(this).val());
      }
    });
    console.log("style", style);
    if (typeof (Storage) !== "undefined") {
      sessionStorage.setItem("calculator", $("#calc-1").html());
    }
    

  }

 

  if (!oldCalculator) {
    registerSelectHandlers();
    $(".btn-calculate").click(calculate);

  }



  



  setTimeout(function () {
    $(".tooltip-corner-post").hover(function () {
      $(this).append('<span class="tooltiptext">Corner post</span>').hide().fadeIn(300);
    }, function () {
      $(this).find("span").remove();
    });

    $(".tooltip-gate-post").hover(function () {

      $(this).append('<span class="tooltiptext">Gate</span>').hide().fadeIn(300);;
    }, function () {
      $(this).find("span").remove();
    });

    $(".tooltip-run-post").hover(function () {
      $(this).append('<span class="tooltiptext">Fence run</span>').hide().fadeIn(300);;
    }, function () {
      $(this).find("span").remove();
    });

  }, 500);
})