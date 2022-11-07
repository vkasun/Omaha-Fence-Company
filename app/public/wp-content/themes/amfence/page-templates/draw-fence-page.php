<?php
/**
 * Template Name: Draw Fence
 * Template Post Type: page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage amfence
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" role="main">


<?
// below entered from page.calculator on shopify 
// ********************************************
?>

<style>
  .select2-container {
  	width: 300px;
    padding-bottom: 10px;
  }
  .btn-container{
    min-width:275px;
    text-align:center;
    margin: 35px 35px 35px 0;
  }
  .btn-container img{
    max-width:100px;
    /*left: 50%;
    position: relative;
    transform: translateX(-50%);*/
  }
  .btn-container p{
    color:#606060;
    max-width: 300px;
    text-align: left;
  }
</style>

<div class="page-width" id="notAvailable" style="display:none">
  <div class="grid">
    <h3>Sorry, calculator is not available for selected fence type</h3>
    <a href="/">Return to home</a>
  </div>
</div>

<FORM NAME="parentForm" id="parentForm">
</FORM> 

<div id="spinner" class="page-width" style="text-align:center">
	<div class="lds-dual-ring"></div>
</div>

<!--
<div class="grid" id="gravity-form-submit" style="display:none">
  <div class="grid__item grid__item medium-up--one-half">
    <div id="calc-1">
      <section id="submitGravityFormSection">
        <h2>Draw My Fence - Submit Your Drawing Now!</h2>
        <div id="formGravityForm">
          <div id="formGravityFormDisplay">
              <?php
                echo do_shortcode('[gravityform id=11 name=true title=false description=false ajax=true]');
              ?>
          </div>
        </div>
    </section>
  </div>
</div>
-->

<div id="main-content2" style="display:none" class="page-width">

  <div class="grid" id="main-calculator" style="display: flex; justify-content:center;">
    <div class="grid__item grid__item medium-up--one-half">
      <div id="calc-1">
          <section id="formSection">
            <h2>Draw My Fence - Get A Free Estimate!</h2>
            <form id="formCalculate"> 
              <div id="formCalulateDisplay">
                  <p>Select your fence type and specifications to get started!</p>       
                  <div>
                    <label id="normalizeLabelWidth">Type</label>
                    <select id="form-type" required>
                      <option></option>
                    </select>
                  </div>
                  <div>
                    <label id="normalizeLabelWidth">Style</label>
                    <select id="form-style" required>
                      <option></option>
                    </select>
                  </div>
                  <div>
                    <label id="normalizeLabelWidth">Height</label>
                    <select id="form-height" required>
                      <option></option>
                    </select>
                  </div>
                  <div>
                    <label id="normalizeLabelWidth">Color</label>
                    <select id="form-color" required>
                      <option></option>
                    </select>
                  </div>
                  <div id="buttonRightSide">
                    <!-- button id="typeFormSubmit" type="submit" class="btn">Next Step > </button -->
                    <button id="btn-start-drawing-tool" type="submit" class="btn">Draw My Fence > </button>
                  </div>
              </div>
            </form>
          </section>
            <div>  
            <section id="startSection" style="display:none">
            </section>    
      </div>
    </div>
  </div>

  <div id="draw-visual">
  <!--Breadcrums-->
  <div class="drawing_breadcrumb">
    <span class="fencebreadcrumb step0" data-src="step0" data-target=".step0">Choose Fence Type</span>
    <span class="fencebreadcrumb step1" data-src="step1" data-target="step1 target">Step 1</span>
    <span class="fencebreadcrumb step2" data-src="step2"  data-target="">Step 2</span>
	<span class="fencebreadcrumb step3" data-src="step3"  data-target="">Step 3</span>
  </div>
  <!--Fence Container-->
    <div class="grid-section container">
      <!--Start Step 0-->
        <div class="choose-fence-step fence-grid container step0">
      <!--Step 0 Vinyl -->
          <div class="type">
            <div class="vinyl-fence">
              <img class="selectable" data-target="vinyl-step1" src="https://www.omahafencecompany.com/wp-content/uploads/2022/10/vinyl-category2.jpg" />
          </div>
      <!--Step 0 Ornamental -->
          <div class="ornamental ">
                <img class="selectable" data-target="ornamental-step1" src="https://www.omahafencecompany.com/wp-content/uploads/2022/10/ornamental-category.jpg" />
          </div>
      <!--Step 0 Wood -->
            <div class="wood ">
                  <img class="selectable" data-target="wood-step1" src="https://www.omahafencecompany.com/wp-content/uploads/2022/10/wood-category.jpg" />
            </div>
      <!--Step 0 Chain Link -->
            <div class="chain-link ">
                  <img class="selectable" data-target="chain-link-step1" src="https://www.omahafencecompany.com/wp-content/uploads/2022/10/chain-link-category.jpg" />
            </div>
          </div>
        </div>

      <!--Start Step 1 -->

      <!--Step 1 Vinyl -->
          <div class="vinyl-step1 step1 choose-fence-step container" data-src="Vinyl" style="display:none;">
                <div class="start-pick container">
                    <section class="privacy-options">
                      <div class="grid3 row">
                        <div class="col-4 selectable"  data-target="vinyl-privacy-step2">
                          <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/privacy.png"> 
                          <span>Privacy</span>
                        </div>
                        <div class="col-4 selectable" data-target="vinyl-semi-privacy-step2">
                          <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/semi-privacy.png"> 
                          <span>Semi-Privacy</span>
                        </div>
                        <div class="col-4 selectable" data-target="vinyl-picket-step2">
                          <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/picket.png"> 
                          <span>Picket</span>
                        </div>
                        <div class="col-4 selectable" data-target="vinyl-closed-picket-step2">
                          <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/closed-picket.png"> 
                          <span>Closed Picket</span>
                        </div>
                        <div class="col-4 selectable" data-target="vinyl-overscallop-picket-step2">
                          <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/overscallop-picket.png"> 
                          <span>Overscallop Picket</span> 
                        </div>
                      <div class="col-4 selectable" data-target="vinyl-underscallop-picket-step2">
                          <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/underscallop-picket.png"> <span>Underscallop Picket</span>
                        </div>
                    </section>
                    </div>
                </div>             
          </div>
      <!-- Step 1 Ornamental -->
        <div class="ornamental-step1 step1 choose-fence-step container" data-src="Ornamental" style="display:none;">
                <div class="start-pick container">
                    <section class="ornamental-options">
                      <div class="grid2 row">
                          <div class="col-6 selectable"  data-target="ornamental-steel-flat-step2">
                            <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/steel_flat_replace-sized.jpg?v=1583187516"> 
                            <span>Steel - Flat Top</span>
                          </div>
                          <div class="col-6 selectable" data-target="ornamental-steel-spear-step2">
                            <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat12.jpg"> 
                            <span>Steel - Spear Top</span>
                          </div>
                      
                          <div class="col-6 selectable" data-target="ornamental-aluminum-flat-step2">
                            <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/alum_flat-sized.jpg?v=1583187460"> 
                            <span>Aluminum - Flat Top</span>
                          </div>
                          <div class="col-6 selectable" data-target="ornamental-aluminum-spear-step2">
                            <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/alum_spear-sized.jpg?v=1583187383"> 
                            <span>Aluminum - Spear Top</span>
                          </div>
                        </div>
                    </section>
                  </div>
                </div>             
          
      <!-- Step 1 Wood -->
        <div class="wood-step1 step1 choose-fence-step container" data-src="Wood" style="display:none;">
            <div class="start-pick container">
              <section class="wood-options">
                <div class="grid2 row">
                    <div class="col-6 selectable"  data-target="wood-solid-step2">
                        <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/solid-wood.jpg"> 
                        <span>Solid</span>
                      </div>
                      <div class="col-6 selectable" data-target="wood-shadow-box-step2">
                        <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/shadow-box.jpg"> 
                        <span>Shadow Box</span>
                      </div>
                  
                      <div class="col-6 selectable" data-target="wood-picket-step2">
                        <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/picket-wood.jpg"> 
                        <span>Picket Wood</span>
                      </div>
                      <div class="col-6 selectable" data-target="wood-scalloped-step2">
                        <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/scalloped-wood.jpg"> 
                        <span>Scalloped Wood</span>
                      </div>
                  </div>
                </section>
            </div>             
        </div>
      <!-- Step 1 Chain Link -->
        <div class="chain-link-step1 step1 choose-fence-step container" data-src="Chain Link" style="display:none;">
              <div class="start-pick container">
                <section class="chain-link-options">
                  <div class="grid2 row">
                    <div class="col-6 selectable"  data-target="commercial-galvanized-step2">
                        <img src="/wp-content/themes/amfence/images/draw-my-fence-images/chain-link/galvan/72-galvanized-chain-link.jpg"> 
                        <span>Commercial Galvanized</span>
                    </div>
                    <div class="col-6 selectable" data-target="residential-galvanized-step2">
                        <img src="/wp-content/themes/amfence/images/draw-my-fence-images/chain-link/galvan/60-galvanized-chain-link.jpg"> 
                        <span>Residential Galvanized</span>
                    </div>
          
                  
                    <div class="col-6 selectable" data-target="vinyal-coated-residential-step2">
                        <img src="/wp-content/themes/amfence/images/draw-my-fence-images/chain-link/extra-images/RM_Residential-ChainLink-04.jpg"> 
                        <span>Vinyal Coated Residential</span>
                    </div>
                    <div class="col-6 selectable" data-target="vinyal-coated-commercial-step2">
                        <img src="/wp-content/themes/amfence/images/draw-my-fence-images/chain-link/extra-images/RM_Residential-ChainLink-05.jpg"> 
                        <span>Vinyal Coated Commercial</span>
                    </div>
                    </div>
                </section>
              </div>             
          </div>

      
      <!-- Start Step Two - Size (Height) -->

      <!-- Step 2 Vinyal Privacy-->
        <div class="vinyl-privacy-step2 step2 choose-fence-step" data-src="Privacy" style="display:none;">
          <h2>Vinyl Privacy</h2>
          <div class="start-pick container">
              <section class="privacy-height-options">
                <div class="grid2 row">
                  <div class="col-6 selectable" data-target="vinyl-privacy-accent-step3">
                    <div class="overlay"></div>
                    <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/privacy/privacy-with-accent/6-Privacy-Picket-Lattice-K-31-TAN.png"> 
                    <span>Privacy with Accent</span>
                  </div>
                  
                  <div class="col-6 selectable" data-target="vinyl-6ft-privacy-step3">
                    <div class="overlay"></div>
                    <a class="more-options">More Options</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/privacy/6-privacy/6-Privacy-K-373-Khaki.jpg"> 
                    <span>6' Privacy</span>
                  </div>
          
        
                  <div class="col-6 selectable" 
                  data-target="vinyl-5ft-privacy-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/privacy/5-privacy/5-privacy-afc-005-White.jpg"> 
                    <span>5' Privacy</span>
                  </div>
                  <div class="col-6 selectable" data-target="vinyl-4ft-privacy-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/privacy/4-privacy/4-Privacy-AFC-001-Sandstone.png"> 
                    <span>4' Privacy</span>
                  </div>
                </div>
              </section>         
          </div>
        </div>
      <!-- Step 2 Vinyal Semi Privacy-->
        <div class="vinyl-semi-privacy-step2 step2 choose-fence-step" data-src="Semi-Privacy" style="display:none;">
          <h2>Vinyl Semi Privacy</h2>
          <div class="start-pick container">
                <section class="privacy-height-options">
                <div class="grid3 row">
                  <div class="col-4 selectable"  data-target="vinyl-semi-privacy-step3">
                    <div class="overlay"></div>
                  <a class="more-options">More Options</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/semi-privacy/6-semi-private/6-Semi-Privacy-AFC-034-Sandstone.jpg"> 
                    <span>6' Semi-Privacy</span>
                  </div>
                  <div class="col-4 selectable" data-target="vinyl-6ft-semi-privacy-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/semi-privacy/5-semi-private.jpg"> 
                    <span>5' Semi-Privacy</span>
                  </div>
                  <div class="col-4 selectable" data-target="vinyl-5ft-semi-privacy-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/semi-privacy/4-semi private/4-Semi-Privacy-1-airspace-AFC-0304-Sandstone.jpg"> 
                    <span>4' Semi Privacy</span>
                  </div>
                </div>
              </section>         
          </div>
        </div>
      <!-- Step 2 Vinyal Picket-->
        <div class="vinyl-picket-step2 step2 choose-fence-step" data-src="Picket" style="display:none;">
          <h2>Vinyl Picket</h2>
          <div class="start-pick container">
              <section class="privacy-height-options">
                <div class="grid3 row">
                <div class="col-4 selectable"  data-target="vinyl-6ft-pciket-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/picket/6-picket-White.jpg"> 
                  <span>6' Picket</span>
                </div>
                <div class="col-4 selectable" data-target="vinyl-6ft-picket-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/picket/5-picket-white-copy.jpeg"> 
                  <span>5' Picket</span>
                </div>
                <div class="col-4 selectable" data-target="vinyl-5ft-picket-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/picket/4-picket-white - Copy get Khaki.jpg"> 
                  <span>4' Picket</span>
                </div>
                </div>
              </section>         
          </div>
        </div>
      <!-- Step 2 Vinyal Closed Picket Privacy-->
        <div class="vinyl-closed-picket-step2 step2 choose-fence-step" data-src="Closed Picket" style="display:none;">
          <h2>Vinyl Closed Picket</h2>
          <div class="start-pick container">
              <section class="privacy-height-options">
                <div class="grid2 row">
                <div class="col-6 selectable" data-target="vinyl-5ft-closed-picket-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/closed-picket/5-closed-picket-fence-white - Copy need sandstone.jpg"> 
                  <span>5' Closed Picket</span>
                </div>
                <div class="col-6 selectable" data-target="vinyl-4ft-closed-picket-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/closed-picket/4-closed-picket-white - Copy need khaki.jpg"> 
                  <span>4' Closed Picket</span>
                </div>
                </div>
              </section>         
          </div>
        </div>
      <!-- Step 2 Vinyal Overscallop Picket Privacy-->
        <div class="vinyl-overscallop-picket-step2 step2 choose-fence-step" data-src="Over Scallop Picket" style="display:none;">
          <h2>Vinyl Over Scallop Picket</h2>
          <div class="start-pick container">
              <section class="privacy-height-options">
                <div class="grid3 row">
                  <div class="col-4 selectable"  data-target="vinyl-6ft-overscallop-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/overscallop/6-overscallop-AFC-012-sandstone.jpg"> 
                    <span>6' Overscallop</span>
                  </div>
                  <div class="col-4 selectable" data-target="vinyl-5ft-overscallop-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/overscallop/5-overscallop.jpg"> 
                    <span>5' OverScallop</span>
                  </div>
                  <div class="col-4 selectable" data-target="vinyl-4ft-overscallop-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/overscallop/4-Overscallop-AFC-016-Tan - Copy-need khaki.jpg"> 
                    <span>4' OverScallop</span>
                  </div>
                </div>
              </section>         
          </div>
        </div>
      <!-- Step 2 Vinyal Underscallop Picket Privacy-->
        <div class="vinyl-underscallop-picket-step2 step2 choose-fence-step" data-src="Under Scallop Picket" style="display:none;">
          <h2>Vinyl Under Scallop Picket</h2>
          <div class="start-pick container">
              <section class="privacy-height-options">
                <div class="grid3 row">
                <div class="col-4 selectable"  data-target="vinyl-6ft-underscallop-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/underscallop/6-underscallop-white.jpg"> 
                  <span>6' Undercallop</span>
                </div>
                <div class="col-4 selectable" data-target="vinyl-5ft-underscallop-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/underscallop/5-underscalloped.jpeg"> 
                  <span>5' UnderScallop</span>
                </div>
                <div class="col-4 selectable" data-target="vinyl-4ft-underscallop-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/underscallop/4-underscallop-white.jpg"> 
                  <span>4' UnderScallop</span>
                </div>
                </div>
              </section>         
          </div>
        </div>

      <!-- Step 2 Ornamental Steel- Flat Top-->
        <div class="ornamental-steel-flat-step2 step2 choose-fence-step" data-src="Steel Flat Top" style="display:none;">
          <h2>Ornamental Steel Flat Top</h2>
          <div class="start-pick container">
              <section class="ornamental-height-options">
                <div class="grid2 row">
                  <div class="col-6 selectable"  data-target="ornamental-6ft-steel-flat-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/ornamental/flat-top.jpg"> 
                    <span>6' Flat Top</span>
                  </div>
                  <div class="col-6 selectable" data-target="ornamental-5ft-steel-flat-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/ornamental/flat-top/5-steel-flat-top.jpg"> 
                    <span>5' Flat Top</span>
                  </div>       
                  <div class="col-6 selectable" data-target="ornamental-4ft-steel-flat-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/ornamental/flat-top/4-steel-flat-top.jpg"> 
                    <span>4' Flat Top</span>
                  </div>
                  <div class="col-6 selectable" data-target="ornamental-3ft-steel-flat-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/ornamental/flat-top/3-steel-flat-top.jpg"> 
                    <span>3' Flat Top</span>
                  </div>
                </div>
              </section>         
          </div>
        </div>

      <!-- Step 2 Ornamental Steel- Spear Top-->
        <div class="ornamental-steel-spear-step2 step2 choose-fence-step" data-src="Steel Spear Top" style="display:none;">
          <h2>Ornamental Steel Spear Top</h2>
          <div class="start-pick container">
              <section class="ornamental-height-options">
                <div class="grid3 row">
                <div class="col-4 selectable"  data-target="ornamental-6ft-steel-spear-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/ornamental/spear-top/6-steel-spear-top.jpg"> 
                  <span>6' Spear Top</span>
                </div>
                <div class="col-4 selectable" data-target="ornamental-5ft-steel-spear-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/ornamental/spear-top/5-steel-spear-top.jpg"> 
                  <span>5' Spear Top</span>
                </div>
                <div class="col-4 selectable" data-target="ornamental-4ft-steel-spear-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/ornamental/spear-top/4-steel-spear-top.jpg"> 
                  <span>4' Spear Top</span>
                </div>
                </div>
              </section>         
          </div>
        </div>
      <!-- Step 2 Ornamental Aluminum- Flat Top-->
        <div class="ornamental-aluminum-flat-step2 step2 choose-fence-step" data-src="Aluminum Flat Top" style="display:none;">
          <h2>Ornamental Aluminum Flat Top</h2>
          <div class="start-pick container">
              <section class="ornamental-height-options">
                <div class="grid3 row">
                <div class="col-4 selectable"  data-target="ornamental-6ft-aluminum-flat-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/ornamental/flat-top/6-aluminum-flat-top.jpg"> 
                  <span>6' Flat Top</span>
                </div>
                <div class="col-4 selectable" data-target="ornamental-5ft-aluminum-flat-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/ornamental/flat-top/5-aluminum-flat-top.jpg"> 
                  <span>5' Flat Top</span>
                </div>
                <div class="col-4 selectable" data-target="ornamental-4ft-aluminum-flat-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/ornamental/flat-top/4-aluminum-flat-top.jpg"> 
                  <span>4' Flat Top</span>
                </div>
                </div>
              </section>         
          </div>
        </div>

      <!-- Step 2 Ornamental Aluminum- Spear Top-->
        <div class="ornamental-aluminum-spear-step2 step2 choose-fence-step" data-src="Aluminum Spear Top" style="display:none;">
          <h2>Ornamental Aluminum Spear Top</h2>
          <div class="start-pick container">
              <section class="ornamental-height-options">
                <div class="grid3 row">
                <div class="col-4 selectable"  data-target="ornamental-6ft-aluminum-spear-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/ornamental/spear-top/6-aluminum-spear-top.jpg"> 
                  <span>6' Spear Top</span>
                </div>
                <div class="col-4 selectable" data-target="ornamental-5ft-aluminum-spear-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/ornamental/spear-top/5-aluminum-spear-top.jpg"> 
                  <span>5' Spear Top</span>
                </div>
                <div class="col-4 selectable" data-target="ornamental-4ft-aluminum-spear-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/ornamental/spear-top/4-aluminum-spear-top.jpg"> 
                  <span>4' Spear Top</span>
                </div>
                </div>
              </section>         
          </div>
        </div>


      <!-- Step 2 Wood Solid -->
        <div class="wood-solid-step2 step2 choose-fence-step" data-src="Solid" style="display:none;">
          <h2>Wood Solid</h2>
          <div class="start-pick container">
              <section class="wood-height-options">
                <div class="grid2 row">
                  <div class="col-6 selectable"  data-target="wood-6ft-solid-step3">
                    <div class="overlay"></div>
                    <a class="more-options">More Options</a>
                      <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/solid/6-Solid-WhiteFir.jpg"> 
                    <span>6' Solid</span>
                  </div>
                  <div class="col-6 selectable" data-target="wood-4ft-solid-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/solid/4-Solid-Cedar.jpg"> 
                    <span>4' Solid</span>
                  </div>
                </div>
              </section>         
          </div>
        </div>

      <!-- Step 2 Wood Shadow Box -->
        <div class="wood-shadow-box-step2 step2 choose-fence-step" data-src="Shadow Box" style="display:none;">
          <h2>Wood Shadow Box</h2>
          <div class="start-pick container">
              <section class="wood-height-options">
                <div class="grid2 row">
                  <div class="col-6 selectable"  data-target="wood-6ft-shadow-box-step3">
                  <div class="overlay"></div>
                  <a class="more-options">More Options</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/shadow-box/6-shadowbox-WhiteFir.jpg"> 
                    <span>6' Shadow Box</span>
                  </div>
                  <div class="col-6 selectable" data-target="wood-4ft-shadow-box-step3">
                  <div class="overlay"></div>
                  <a class="more-options">More Options</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/shadow-box/4-shadowbox-custom-4-pickets-cedar.jpg"> 
                    <span>4' Shadow Box</span>
                  </div>
                </div>
              </section>         
          </div>
        </div>

      <!-- Step 2 Wood Picket Box -->
        <div class="wood-picket-step2 step2 choose-fence-step" data-src="Picket" style="display:none;">
          <h2>Wood Picket</h2>
          <div class="start-pick container">
              <section class="wood-height-options">
                <div class="grid2 row">
                  <div class="col-6 selectable"  data-target="wood-6ft-picket-step3">
                  <div class="overlay"></div>
                  <a class="more-options">More Options</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat51.jpg"> 
                    <span>6' Picket</span>
                  </div>
                  <div class="col-6 selectable" data-target="wood-4ft-picket-step3">
                  <div class="overlay"></div>
                  <a class="more-options">More Options</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat62.jpg"> 
                    <span>4' Picket</span>
                  </div>
                </div>
              </section>         
          </div>
        </div>

      <!-- Step 2 Wood Scalloped Box -->
        <div class="wood-scalloped-step2 step2 choose-fence-step" data-src="Scalloped" style="display:none;">
          <h2>Wood Scalloped</h2>
          <div class="start-pick container">
              <section class="wood-height-options">
                <div class="grid2 row">
                <div class="col-6 selectable"  data-target="wood-6ft-scalloped-step3">
                <div class="overlay"></div>
                <a class="more-options">More Options</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/scalloped-wood.jpg"> 
                  <span>6' Scalloped</span>
                </div>
                <div class="col-6 selectable" data-target="wood-4ft-scalloped-step3">
                <div class="overlay"></div>
                <a class="more-options">More Options</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/scalloped-wood/4-Picket-Scalloped-Cedar.jpg"> 
                  <span>4' Scalloped</span>
                </div>
                </div>
              </section>         
          </div>
        </div>

      <!-- Step 2 Chain Link Commercial Galvanized -->
        <div class="commercial-galvanized-step2 step2 choose-fence-step" data-src="Commercial Galvanized" style="display:none;">
          <h2>Chain Link Commercial Galvanized</h2>
          <div class="start-pick container">
              <section class="chain-link-height-options">
                <div class="grid3 row">
                  <div class="col-4 selectable"  data-target="commercial-galvanized-36ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat5.jpg"> 
                    <span>36' Chain Link</span>
                  </div>
                  <div class="col-4 selectable"  data-target="commercial-galvanized-42ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat5.jpg"> 
                    <span>42' Chain Link</span>
                  </div>
                  <div class="col-4 selectable"  data-target="commercial-galvanized-48ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat5.jpg"> 
                    <span>48' Chain Link</span>
                  </div>
                  <div class="col-4 selectable"  data-target="commercial-galvanized-60ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat5.jpg"> 
                    <span>60' Chain Link</span>
                  </div>
                  <div class="col-4 selectable"  data-target="commercial-galvanized-72ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat5.jpg"> 
                    <span>72' Chain Link</span>
                  </div>
                  <div class="col-4 selectable"  data-target="commercial-galvanized-84ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat5.jpg"> 
                    <span>84' Chain Link</span>
                  </div>
                  <div class="col-4 selectable"  data-target="commercial-galvanized-96ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat5.jpg"> 
                    <span>96' Chain Link</span>
                  </div>
                  <div class="col-4 selectable"  data-target="commercial-galvanized-120ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat5.jpg"> 
                    <span>120' Chain Link</span>
                  </div>
                  <div class="col-4 selectable"  data-target="commercial-galvanized-144ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat5.jpg"> 
                    <span>144' Chain Link</span>
                  </div>
                </div>
              </section>         
          </div>
        </div>
      
      <!-- Step 2 Chain Link Residential Galvanized -->
      <div class="residential-galvanized-step2 step2 choose-fence-step" data-src="Residential Galvanized" style="display:none;">
          <h2>Chain Link Residential Galvanized</h2>
          <div class="start-pick container">
              <section class="chain-link-height-options">
                <div class="grid3 row">
                  <div class="col-4 selectable"  data-target="residential-galvanized-36ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat2.jpg"> 
                    <span>36' Chain Link</span>
                  </div>
                  <div class="col-4 selectable"  data-target="residential-galvanized-42ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat2.jpg"> 
                    <span>42' Chain Link</span>
                  </div>
                  <div class="col-4 selectable"  data-target="residential-galvanized-48ft-step3">
                    <div class="overlay"></div>
                    <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat2.jpg"> 
                    <span>48' Chain Link</span>
                  </div>
                  <div class="col-4 selectable"  data-target="residential-galvanized-60ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat2.jpg"> 
                    <span>60' Chain Link</span>
                  </div>
                  <div class="col-4 selectable"  data-target="residential-galvanized-72ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat2.jpg"> 
                    <span>72' Chain Link</span>
                  </div>
                </div>
              </section>         
          </div>
        </div>

      <!-- Step 2 VINYL COATED RESIDENTIAL CHAIN LINK -->
      <div class="vinyal-coated-residential-step2 step2 choose-fence-step" data-src="Residential Vinyl Coated" style="display:none;">
          <h2>Chain Link Residential Vinyl Coated</h2>
          <div class="start-pick container">
              <section class="chain-link-height-options">
                <div class="grid2 row">
                  <div class="col-6 selectable"  data-target="vinyal-coated-residential-42ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat4.jpg"> 
                    <span>42' Vinyl Coated Chain Link</span>
                  </div>
                  <div class="col-6 selectable"  data-target="vinyal-coated-residential-48ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat4.jpg"> 
                    <span>48' Vinyl Coated Chain Link</span>
                  </div>
          
                  <div class="col-6 selectable"  data-target="vinyal-coated-residential-60ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat4.jpg"> 
                    <span>60' Vinyal Coated Chain Link</span>
                  </div>
                  <div class="col-6 selectable"  data-target="vinyal-coated-residential-72ft-step3">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat4.jpg"> 
                    <span>72' Vinyal Coated Chain Link</span>
                  </div>
                </div>
              </section>         
          </div>
        </div>

      <!-- Step 2 VINYL COATED COMMERCIAL CHAIN LINK -->
      <div class="vinyal-coated-commercial-step2 step2 choose-fence-step" data-src="Commercial Vinyl Coated" style="display:none;">
          <h2>Chain Link Commercial Vinyl Coated</h2>
          <div class="start-pick container">
              <section class="chain-link-height-options">
                <div class="grid2 row">
                <div class="col-6 selectable"  data-target="vinyal-coated-commercial-48ft-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat4.jpg"> 
                  <span>48' Vinyl Coated Chain Link</span>
                </div>
                <div class="col-6 selectable"  data-target="vinyal-coated-commercial-72ft-step3">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="https://cdn.shopify.com/s/files/1/2393/7423/files/cat4.jpg"> 
                  <span>72' Vinyal Coated Chain Link</span>
                </div>
                </div>
              </section>         
          </div>
        </div>


      <!-- Step 3 Vinyal Privacy-->
        <div class="vinyl-6ft-privacy-step3 step3 choose-fence-step" data-src="6'" style="display:none;">
          <h2>Vinyl Privacy</h2>
          <div class="start-pick container">
              <section class="privacy-height-options">
                <div class="grid2 row">
                <div class="col-6 selectable" data-target="vinyl-6ft-privacy-step4">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/privacy/6-privacy/6-Privacy-K-373-Khaki.jpg"> 
                  <span>6' Privacy</span>
                </div>
                <div class="col-6 selectable" 
                data-target="vinyl-6ft-woodland-privacy-step4">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/privacy/5-privacy/5-privacy-afc-005-White.jpg"> 
                  <span>6' Woodland Series</span>
                </div>
                </div>
              </section>         
          </div>
        </div>
      <!-- Step 3 Vinyal Semi Privacy-->
        <div class="vinyl-semi-privacy-step3 step3 choose-fence-step" data-src="Semi-Privacy" style="display:none;">
          <h2>Vinyl Semi-Privacy</h2>
          <div class="start-pick container">
              <section class="privacy-height-options">
                <div class="grid2 row">
                <div class="col-6 selectable" data-target="vinyl-6ft-semi-privacy-step4">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/privacy/6-privacy/6-Privacy-K-373-Khaki.jpg"> 
                  <span>6' Semi Privacy</span>
                </div>
                <div class="col-6 selectable" 
                data-target="vinyl-6ft-semi-privacy-airspace-step4">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/vinyl/privacy/5-privacy/5-privacy-afc-005-White.jpg"> 
                  <span>6' Semi Privacy with 1" Airspace</span>
                </div>
                </div>
              </section>         
          </div>
        </div>

      <!-- Step 3 6' Wood Solid-->
        <div class="wood-6ft-solid-step3 step3 choose-fence-step" data-src="6'" style="display:none;">
          <h2>6' Wood Solid</h2>
          <div class="start-pick container">
              <section class="privacy-height-options">
                <div class="grid2 row">
                  <div class="col-6 selectable" data-target="wood-6ft-solid-step4">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/solid/6-Solid-WhiteFir.jpg"> 
                    <span>6' Solid</span>
                  </div>
                  <div class="col-6 selectable" 
                  data-target="wood-6ft-solid-custom-step4">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/solid/6-Solid-4-Custom-Pickets-WhiteFir.jpg"> 
                    <span>6' Solid with Custom 4" Pickets</span>
                  </div>
                </div>
              </section>         
          </div>
        </div>

      <!-- Step 3 6' Wood Shadow Box-->
        <div class="wood-6ft-shadow-box-step3 step3 choose-fence-step" data-src="6'" style="display:none;">
          <h2>6' Wood Shadow Box</h2>
          <div class="start-pick container">
              <section class="privacy-height-options">
                <div class="grid2 row">
                <div class="col-6 selectable" data-target="wood-6ft-shadow-box-step4">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/shadow-box/6-shadowbox-WhiteFir.jpg"> 
                  <span>6' Shadow Box</span>
                </div>
                <div class="col-6 selectable" 
                data-target="wood-6ft-shadow-box-custom-step4">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/shadow-box/6-shadowbox-custom-4-pickets-Whitefir.jpg"> 
                  <span>6' Shadow Box with Custom 4" Pickets</span>
                </div>
                </div>
              </section>         
          </div>
        </div>
      <!-- Step 3 4' Wood Shadow Box-->
        <div class="wood-4ft-shadow-box-step3 step3 choose-fence-step" data-src="4'" style="display:none;">
          <h2>4' Wood Solid</h2>
          <div class="start-pick container">
              <section class="privacy-height-options">
                <div class="grid2 row">
                <div class=" col-6 selectable" data-target="wood-4ft-shadow-box-step4">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/shadow-box/4-shadowbox-custom-4-pickets-cedar.jpg"> 
                  <span>4' Shadow Box</span>
                </div>
                <div class="col-6 selectable" 
                data-target="wood-4ft-shadow-box-custom-step4">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/shadow-box/4-shadowbox-custom-6-pickets-cedar.jpg"> 
                  <span>4' Shadow Box with Custom 4" Pickets</span>
                </div>
                </div>
              </section>         
          </div>
        </div>

      <!-- Step 3 6' Wood Picket -->
        <div class="wood-6ft-picket-step3 step3 choose-fence-step" data-src="6'" style="display:none;">
          <h2>6' Wood Picket</h2>
          <div class="start-pick container">
              <section class="privacy-height-options">
                <div class="grid2 row">
                    <div class="col-6 selectable" data-target="wood-6ft-picket-goth-step4">
                    <div class="overlay"></div>
                    <a>Draw My Fence</a>
                      <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/picket wood/6-French-Gothic.jpg"> 
                      <span>French Goth</span>
                    </div>
                  <div class="col-6 selectable" 
                  data-target="wood-6ft-picket-4-inch-step4">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/picket wood/6-Picket-4in-Pickets.jpg"> 
                    <span>6' Picket with 4' Pickets</span>
                  </div>
                
                  <div class="col-6 selectable" 
                  data-target="wood-6ft-picket-alternating-step4">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/picket wood/6-picker-alternating.webp"> 
                    <span>6' Alternating Picket</span>
                  </div>
                  <div class="col-6 selectable" 
                  data-target="wood-6ft-picket-gap-step4">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/picket wood/6-Picket-1in-Gap.jpg"> 
                    <span>6' Picket W/1" Gap</span>
                  </div>
                </div>
              </section>         
          </div>
        </div>

      <!-- Step 3 4' Wood Picket -->
        <div class="wood-4ft-picket-step3 step3 choose-fence-step" data-src="4'" style="display:none;">
          <h2>4' Wood Picket</h2>
          <div class="start-pick container">
              <section class="privacy-height-options">
                <div class="grid3 row">
                  <div class="col-4 selectable" data-target="wood-4ft-picket-goth-step4">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/picket wood/4-French-Gothic-Fir.jpg"> 
                    <span>French Goth</span>
                  </div>
                  <div class="col-4 selectable" 
                  data-target="wood-4ft-picket-step4">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/picket wood/4-Picket-Cedar.jpg"> 
                    <span>4' Picket Fence</span>
                  </div>
                  <div class="col-4 selectable" 
                  data-target="wood-4ft-picket-capboard-step4">
                  <div class="overlay"></div>
                  <a>Draw My Fence</a>
                    <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/picket wood/4-Picket-Capboard-fir.jpg"> 
                    <span>4' Picket W/Capboard</span>
                  </div>
                </div>
              </section>         
          </div>
        </div>

      <!-- Step 3 6' Wood Scalloped -->
        <div class="wood-6ft-scalloped-step3 step3 choose-fence-step" data-src="6'" style="display:none;">
          <h2>6' Wood Scalloped</h2>
          <div class="start-pick container">
            <div class="grid3 row">
              <section class="privacy-height-options row">
                <div class="col-4 selectable" data-target="wood-6ft-scalloped-step4">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/scalloped-wood/6-Shadow-box-Scalloped-Fir.jpg"> 
                  <span>6' Shadow Box Scalloped</span>
                </div>
                <div class="col-4 selectable" 
                data-target="wood-6ft-scalloped-solid-step4">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/scalloped-wood/6-Solid-Scalloped-Fir.jpg"> 
                  <span>6' Solid Scalloped</span>
                </div>
                <div class="col-4 selectable" 
                data-target="wood-6ft-scalloped-picket-step4">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/scalloped-wood/6-Picket-Scalloped-Fir.jpg"> 
                  <span>6' Picket Scalloped</span>
                </div>
              </section>  
              </div>       
          </div>
        </div>

      <!-- Step 3 4' Wood Scalloped -->
		  <div class="wood-4ft-scalloped-step3 step3 choose-fence-step" data-src="4'" style="display:none;">
        <h2>4' Wood Scalloped</h2>
        <div class="start-pick container">
            <section class="privacy-height-options">
              <div class="grid3 row">
                <div class="col-4 selectable" data-target="wood-4ft-scalloped-step4">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/scalloped-wood/4-Shadow-box-Scalloped-Cedar.jpg"> 
                  <span>4' Shadow Box Scalloped</span>
                </div>
                <div class="col-4 selectable" 
                data-target="wood-4ft-scalloped-picket-step4">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/scalloped-wood/4-Solid-Scalloped-Cedar.jpg"> 
                  <span>4' Solid Scalloped</span>
                </div>
                <div class="col-4 selectable" 
                data-target="wood-4ft-picket-capboard-step4">
                <div class="overlay"></div>
                <a>Draw My Fence</a>
                  <img src="/wp-content/themes/amfence/images/draw-my-fence-images/wood/scalloped-wood/4-Picket-Scalloped-Cedar.jpg"> 
                  <span>4' Picket Scalloped</span>
                </div>
              </div>
            </section>         
      </div>
    </div>
  </div> <!--end of Draw Fence -->
</div> <!--end of Main-Content2 -->



<!-- script type="text/javascript" src="{{'calculator_config.js'|asset_url}}"></script -->
<script type="text/javascript" src="/wp-content/themes/amfence/js/draw-fence-config.js"></script>
<!-- add these files, they were not included on shopify's calc page, but are needed and related to the calc js functions -->
<script type="text/javascript" src="/wp-content/themes/amfence/js/draw-fence-form.js"></script>
<script type="text/javascript" src="/wp-content/themes/amfence/js/draw-fence.js"></script>
<script type="text/javascript" src="/wp-content/themes/amfence/js/draw-fence-layout.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?php 
// *********************************************************
// end insert code from shopify
?>

</main><!-- #site-content -->
<?php get_footer(); ?>

