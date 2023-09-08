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
               <hr>
               <div class="card-body">

                  <p>e-mercado is developed by the Southern Leyte State University (SLSU), 
                     thru the College of Computer Studies and Information Technology (CCSIT), 
                     in collaboration with the Provincial Government of Southern Leyte, its Local Government Units, 
                     Office of the Sangguniang Panlalawigan, Provincial Systems Administrator’s Office, Provincial Veterinarian's Office, 
                     and Provincial Agricultural Services Office.
                  </p>
                  <p>
                  e-mercado is jointly managed by the SLSU-CCSIT, the Provincial Systems Administrator’s Office, 
                  Provincial Veterinarian's Office, and Provincial Agricultural Services Office.
                  Any reference to “US”, “WE” or “OUR” means these offices collectively.
                  </p>
                  <p>
                  This Privacy Statement explains what information we collect, process, and share;
                  why we do so; and your rights with regard to your information. We process your information pursuant 
                  to and in accordance with Republic Act No. 10173 (Data Privacy Act).
                  </p>
                  <p>
                  We may amend this Privacy Notice from time to time. When certain changes require your consent, we shall communicate the changes to you and ask for your consent. Otherwise, changes take effect immediately upon posting.
                  </p>

                  <div class = "h6">WHAT INFORMATION WE COLLECT</div>
                  <br>
                  <em>For sellers:</em>
                  <p>When you create an account with e-Mercado, we will ask for your full name, address, birthday, sex, civil status, educational attainment and active mobile number so we can identify and contact you, for verification purposes. At your option, you may also provide us with a picture of a valid ID for verification purposes.</p>

                  <p>When you use e-Mercado as sellers, other pertinent data will be gathered such as the estimated farm size, its address, type of farm, estimated yield and estimated income. Also collected is the aid received if the seller is a program beneficiary.</p>
                  <br>
                  <em >For buyers:</em>
                  <p>When you create an account with e-Mercado, we will ask for your full name, address, 
                     birthday, and active mobile number. Your profile picture and a valid ID will also 
                     be collected for verification purposes.</p>

                  <p>When you use the e-Mercado as buyers, your browsing and purchasing history may also be obtained to improve your user experience through AI-based recommendation.</p>

                  <div class = "h6">CHILDREN’S PRIVACY</div>
                  <p>We do not knowingly collect or solicit personal information from minors (17 and below years of age), 
                     and we do not knowingly allow such persons to use e-Mercado. 
                     In the event that we learn that we collected personal information from minors, 
                     we will immediately delete the information, with notice. If you believe that we might have collected such information, 
                     please contact us immediately through the contact information below.</p>

                  <div class = "h6">WHY WE COLLECT YOUR INFORMATION</div>
                  <p>We collect your information to provide you a platform to search for local products, 
                     and conduct buying and selling agreements online, PRIOR TO actual payment offline. 
                     For sellers, data such as farm size, the type of farm and yields are collected in order to 
                     maintain an up-to-date database relative to agro-fishery and processed products of Southern Leyte.
                     Likewise, it is the aim of this platform to perform data analysis that may be helpful to the 
                     provincial government of Southern Leyte, farmers, fisher folks, 
                     peoples’ organizations, and Southern Leyte as a whole.</p>

                  </p>In case of any security incident or data breach, we may also use your information 
                  in our investigative reporting to the National Privacy Commission.</p>


                  <div class = "h6">HOW WE USE, SHARE, AND RETAIN YOUR INFORMATION</div>
                  <p>We use your information to facilitate online selling and buying agreements of 
                     agro-fishery and other products of Southern Leyte. 
                     Whenever we can, we submit collected information in an 
                     aggregated manner to ensure Users’ privacy.</p>
                  <p>Furthermore, we use your information to maintain and improve e-mercado. 
                     Only our authorized personnel will have full access to your information. 
                     Registered buyers and seller can only view data necessary for them to reach into an agreement. 
                     The third-party provider of our data centers does not have access to information that will enable your identification.</p>
                  <p>We will keep your information for as long as necessary unless you request the deletion of your information, 
                     after which these will be securely deleted. </p>


                  <div class = "h6">HOW WE SECURE YOUR INFORMATION</div>
                  <p>We implement reasonable and appropriate physical, technical, and organizational 
                     measures to prevent the loss, destruction, misuse, or alteration of your information. 
                     While there is no guarantee that information sent over the internet is fully secured, we keep 
                     and protect your information using a secured server behind a firewall, encryption, and security controls.</p>


                  <div class = "h6">EXERCISING YOUR RIGHTS</div>
                  <p>The Data Privacy Act gives you certain rights to your information. 
                     If you want to exercise your rights or learn more about how we process your information, 
                     please contact your local government unit.</p>

                  Please add contact details here

               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>