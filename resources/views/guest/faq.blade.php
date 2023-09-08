<x-app-layout :assets="$assets ?? []">
   <div class="row m-2">  
      <div class="row">

         <div class="col-12">
            <div class="card ">
               <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">{{$pageTitle}}</h4>
                     </div>
                     <div class="card-action">
                           {!! $headerAction !!}
                     </div>
               </div>
               
               <div class="card-body">
                     
               </div>
            </div>
         </div>
      </div>
      <div class="row">  
         <div class="col-lg-12 col-sm-12">
            <div class = "card">
               <div class="tab-content">
                  <div class="tab-pane bd-heading-1 fade show active" id="content-accordion-prv" role="tabpanel" aria-labelledby="typo-output">
                     <div class="bd-example">
                           <div class="accordion" id="accordionExample">
                              <div class="accordion-item">
                                 <h4 class="accordion-header" id="headingOne">
                                       <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          What is e-mercado?
                                       </button>
                                 </h5>
                                 <div id="collapseOne" class="accordion-collapse collapse show text-dark" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                       <div class="accordion-body">
                                       <strong>e-mercado</strong> is an electronic marketplace or an online platform for buying and selling products. The term "e-mercado" combines "e-" (short for electronic) with "mercado" (which means market in Spanish and Portuguese), emphasizing the online nature of the marketplace. It provides a virtual space for connecting buyers and sellers, facilitating transactions, and enabling commerce through digital technologies.
                                       </div>
                                 </div>
                              </div>
                              <div class="accordion-item">
                                 <h4 class="accordion-header" id="headingTwo">
                                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          How does e-mercado work?
                                       </button>
                                 </h5>
                                 <div id="collapseTwo" class="accordion-collapse collapse text-dark" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                       <div class="accordion-body">
                                          e-mercado works by creating an online platform where sellers can list their agricultural, fishery and value-added products, and buyers can browse and make a deal or agreement electronically with the seller. It typically involves features such as product catalogs, search functions, and order management tools to streamline the buying and selling process.
                                       </div>
                                 </div>
                              </div>
                              <div class="accordion-item">
                                 <h4 class="accordion-header" id="headingThree">
                                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                          Who can use e-mercado?
                                       </button>
                                 </h5>
                                 <div id="collapseThree" class="accordion-collapse collapse text-dark" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                       <div class="accordion-body">
                                       e-mercado can be used by various individuals (farmers, fisher folks) and businesses (MSMEs, peoples’ organizations) including wholesalers, manufacturers, and consumers. It caters to both B2B (business-to-business) and B2C (business-to-consumer) transactions. ONLY Southern Leyteños may sell their products in this platform. 
                                       </div>
                                 </div>
                              </div>

                              <div class="accordion-item">
                                 <h4 class="accordion-header" id="headingFour">
                                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                       What are the benefits of using e-mercado?
                                       </button>
                                 </h5>
                                 <div id="collapseFour" class="accordion-collapse collapse text-dark" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                       <div class="accordion-body">
                                       Using e-mercado offers several benefits, including expanded market reach, increased accessibility for buyers and sellers, convenience for customers, and the ability to automate certain aspects of commerce. 
                                       </div>
                                 </div>
                              </div>

                              <div class="accordion-item">
                                 <h4 class="accordion-header" id="headingFive">
                                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                       How can I register as a seller or buyer on e-mercado?
                                       </button>
                                 </h5>
                                 <div id="collapseFive" class="accordion-collapse collapse text-dark" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                       <div class="accordion-body">
                                       You will need to visit the platform's website at https://e-mercado.southernleyte.org.ph and follow the registration instructions provided. This may involve providing personal or business information and agreeing to the platform's terms and conditions.
                                       </div>
                                 </div>
                              </div>

                              <div class="accordion-item">
                                 <h4 class="accordion-header" id="headingSix">
                                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                                       How are payments processed on e-mercado?
                                       </button>
                                 </h5>
                                 <div id="collapseSix" class="accordion-collapse collapse text-dark" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                       <div class="accordion-body">
                                       Currently, no payment facility is integrated into the platform. However, this feature will be incorporated into e-mercado in the near future. For the meantime, payment may depend on both sellers and buyer’s agreement during their chat conversation. 
                                       </div>
                                 </div>
                              </div>

                              <div class="accordion-item">
                                 <h4 class="accordion-header" id="headingSeven">
                                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseThree">
                                       How can I resolve issues on e-mercado?
                                       </button>
                                 </h5>
                                 <div id="collapseSeven" class="accordion-collapse collapse text-dark" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                       <div class="accordion-body">
                                       e-mercado platforms typically have customer support mechanisms in place with the help of our municipal/provincial system administrators. If you encounter any issues, you can contact the platform's customer support team for assistance. They will guide you through the necessary steps to resolve the issue.
                                       </div>
                                 </div>
                              </div>

                           </div>
                     </div>
                  </div>
                  <div class="tab-pane bd-heading-1 fade show" id="content-accordion-code" role="tabpanel" aria-labelledby="typo-output">
                     <div class="section-block"><pre><code class="language-markup"> <div class="bd-example">
                           <div class="accordion" id="accordionExample">
                              <div class="accordion-item">
                                 <h4 class="accordion-header" id="headingOne">
                                       <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          Accordion Item #1
                                       </button>
                                 </h4>
                                 <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                       <div class="accordion-body">
                                          <strong>This is the first item&#x27;s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It&#x27;s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                       </div>
                                 </div>
                              </div>
                              <div class="accordion-item">
                                 <h4 class="accordion-header" id="headingTwo">
                                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          Accordion Item #2
                                       </button>
                                 </h4>
                                 <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                       <div class="accordion-body">
                                          <strong>This is the second item&#x27;s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It&#x27;s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                       </div>
                                 </div>
                              </div>
                              <div class="accordion-item">
                                 <h4 class="accordion-header" id="headingThree">
                                       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                          Accordion Item #3
                                       </button>
                                 </h4>
                                 <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                       <div class="accordion-body">
                                          <strong>This is the third item&#x27;s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It&#x27;s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                       </div>
                                 </div>
                              </div>
                           </div>
                     </div></code></pre></div>

                  </div>
               </div>
            </div>
         </div>
         </div></div>
   </div>
</x-app-layout>