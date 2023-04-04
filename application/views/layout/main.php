<html lang="vi-VN" translate="no" class=" svg flexbox csstransforms">
   <head>
   	<? require_once(APPPATH."views/module/head_html.php"); ?>
   </head>
   <body class="home-template has-fixed-navbar" cz-shortcut-listen="true">
   		<? require_once(APPPATH."views/module/header.php"); ?>
      <div id="header-sticky" class="d-none d-md-block" style="background-color: #ffffff;">
         <div class="container">
            <div class="row align-items-center justify-content-between">
               <div class="contentstickynew_logo col-xl-2 col-lg-2 col-md-2"></div>
               <div class="contentstickynew_menu col-xl-8 col-lg-8 col-md-8 text-center"></div>
               <div class="contentstickynew_cart col-xl-2 col-lg-2 col-md-2 d-flex justify-content-end"></div>
            </div>
         </div>
      </div>
      <main id="trang-chu" class="main-content page-container drawer-page-content">
	  	<?=$content?>    
      </main>
      <div id="shopify-section-nov-footer" class="shopify-section nov-footer">
	  	<? require_once(APPPATH."views/module/footer.php"); ?>
      </div>
      <div class="canvas-menu drawer-left">
         <div class="menu-m-lang clearfix">
            <ul class="sigin-list">
               <li class="sigin-item">
                  <a href="https://www.yen-vietnam.com/tai-khoan/dang-nhap.html">
                  Đăng nhập                </a>
               </li>
               <li class="sigin-item">
                  /
               </li>
               <li class="sigin-item">
                  <a href="https://www.yen-vietnam.com/tai-khoan/dang-ky-tai-khoan.html">
                  Đăng ký                </a>
               </li>
            </ul>
            <!-- <ul class="lang-list">
               <li class="list-inline-item" style="margin-right: 5px;">
               <a href="#">
               <span class="selected">VI <img src="https://www.yen-vietnam.com/template/images/vietnamese.png" alt="" style="width:16px;height: 14px;"></span>
               </a>
               </li>
               <li class="list-inline-item">
               <a href="https://www.yen-vietnam.com/call-service/set-lang/en.html.html?p=https://www.yen-vietnam.com/">
               <span class="">EN <img src="https://www.yen-vietnam.com/template/images/english.png" alt="" style="width:16px;height: 17px;"></span>
               </a>
               </li>
               </ul> -->
         </div>
         <div class="canvas-header-box d-flex justify-content-center align-items-center">
            <div class="close-box"><i class="zmdi zmdi-close"></i></div>
         </div>
      </div>
      <div class="canvas-overlay"></div>
      <template id="auto-clicker-autofill-popup">
         <style>
            @import url(https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css);
            @import url(https://fonts.googleapis.com/css?family=Poppins:300,400,500&subset=latin-ext);
            #body {
            background: white;
            border-radius: 5px;
            box-shadow: 0 30px 50px 0 rgb(44 49 59 / 20%);
            overflow: hidden;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            min-width: 250px;
            max-width: 400px;
            }
            .modal-dialog {
            margin: auto;
            }
            .modal-content {
            border: none;
            }
            /*Header*/
            .modal-header {
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
            padding-top: 0.5em;
            padding-bottom: 0.5em;
            padding-left: 0;
            height: 47px;
            background: rgba(112.520718, 44.062154, 249.437846, 0.1);
            color: #fff;
            border: none;
            }
            .modal-header button.btn {
            color: #712cf9;
            width: 1em;
            height: 1em;
            display: flex;
            box-sizing: content-box;
            justify-content: center;
            align-items: center;
            padding: 0;
            --bs-btn-close-opacity: 1;
            --bs-btn-close-hover-opacity: 0.75;
            --bs-btn-close-focus-shadow: 0 0 0 0.25em rgba(13, 110, 253, 0.25);
            opacity: var(--bs-btn-close-opacity);
            }
            .modal-header button.btn svg {
            width: inherit;
            height: inherit;
            }
            .modal-header button.btn:focus {
            box-shadow: var(--bs-btn-close-focus-shadow);
            }
            .modal-header button.btn:hover {
            opacity: var(--bs-btn-close-hover-opacity);
            }
            .modal-header button.expand .bi-arrows-expand {
            display: block !important;
            }
            .modal-header button.expand .bi-dash-lg {
            display: none;
            }
            .modal-header .modal-title {
            padding-left: 2em;
            color: #712cf9;
            position: relative;
            font-size: 1em;
            }
            .modal-header .modal-title::before {
            content: '';
            position: absolute;
            left: 0.75em;
            top: calc(50% - 0.375em);
            display: block;
            width: 0.75em;
            height: 0.75em;
            border-radius: 50%;
            background: red;
            cursor: pointer;
            box-shadow: 0 0 0 rgba(255, 0, 0, 0.4);
            animation: pulse 2s infinite;
            }
            @-webkit-keyframes pulse {
            0% {
            -webkit-box-shadow: 0 0 0 0 rgba(255, 0, 0, 0.4);
            }
            70% {
            -webkit-box-shadow: 0 0 0 10px rgba(255, 0, 0, 0);
            }
            100% {
            -webkit-box-shadow: 0 0 0 0 rgba(255, 0, 0, 0);
            }
            }
            @keyframes pulse {
            0% {
            -moz-box-shadow: 0 0 0 0 rgba(255, 0, 0, 0.4);
            box-shadow: 0 0 0 0 rgba(255, 0, 0, 0.4);
            }
            70% {
            -moz-box-shadow: 0 0 0 10px rgba(255, 0, 0, 0);
            box-shadow: 0 0 0 10px rgba(255, 0, 0, 0);
            }
            100% {
            -moz-box-shadow: 0 0 0 0 rgba(255, 0, 0, 0);
            box-shadow: 0 0 0 0 rgba(255, 0, 0, 0);
            }
            }
            /*Body*/
            .modal-body {
            max-height: calc(100vh - 7em);
            overflow-y: auto;
            overflow-x: hidden;
            padding: 0.5em 0;
            }
            td div {
            vertical-align: middle;
            width: 180px;
            line-height: 24px;
            }
            tr button {
            visibility: hidden;
            }
            tr:hover button {
            visibility: visible;
            }
            /*Footer*/
            .modal-footer {
            padding: 0;
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-tertiary-bg-rgb), var(--bs-bg-opacity)) !important;
            }
            .modal-footer a {
            display: flex;
            align-items: center;
            }
            .modal-footer a svg {
            margin-right: 0.15em;
            }
            .modal-footer a:hover {
            color: #712cf9 !important;
            }
         </style>
         <div id="body" class="modal position-static d-block" data-bs-theme="light">
            <div class="modal-dialog">
               <div class="modal-content">
                  <header class="modal-header">
                     <h6 class="modal-title text-truncate">Auto Clicker - AutoFill</h6>
                     <div class="d-flex justify-content-center align-items-center">
                        <button type="button" class="btn ms-2" aria-label="collapse">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-expand" style="display: none" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 8ZM7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2ZM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10Z"></path>
                           </svg>
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"></path>
                           </svg>
                        </button>
                        <button type="button" class="btn ms-2" data-bs-dismiss="modal" aria-label="Close">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                              <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"></path>
                           </svg>
                        </button>
                     </div>
                  </header>
                  <main class="modal-body" id="collapse-main">
                     <slot name="actions" hidden="">
                        <table class="table table-sm table-hover mb-0">
                           <thead>
                              <tr>
                                 <th scope="col">Name/Element</th>
                                 <th scope="col">Value</th>
                                 <th scope="col"></th>
                              </tr>
                           </thead>
                           <tbody class="table-group-divider"></tbody>
                        </table>
                     </slot>
                     <slot name="no-actions">
                        <div class="px-2">
                           <div class="card w-100">
                              <div class="card-body">
                                 <h5 class="card-title mb-3 text-primary">Start filling form...</h5>
                                 <hr>
                                 <h6 class="card-subtitle mb-2 text-muted">If you have already filled form</h6>
                                 <button type="button" auto-generate-config="" class="btn btn-sm btn-outline-secondary">Already Filled ?</button>
                              </div>
                           </div>
                        </div>
                     </slot>
                  </main>
                  <footer class="modal-footer justify-content-center" id="collapse-footer">
                     <ul class="nav justify-content-between w-100">
                        <li class="nav-item">
                           <a href="https://getautoclicker.com/docs/3.x/getting-started" class="nav-link px-2 text-muted" target="_blank">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-richtext" viewBox="0 0 16 16">
                                 <path d="M7 4.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm-.861 1.542 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V7.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V7s1.54-1.274 1.639-1.208zM5 9a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z"></path>
                                 <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"></path>
                              </svg>
                              Docs
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="https://discord.gg/ubMBeX3" class="nav-link px-2 text-muted" target="_blank">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
                                 <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"></path>
                              </svg>
                              Chat
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="https://dev.getautoclicker.com/" class="nav-link px-2 text-muted" target="_blank" id="settings">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                 <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"></path>
                              </svg>
                              Advance
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="https://github.com/sponsors/Dhruv-Techapps" class="nav-link px-2 text-muted" target="_blank">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-balloon-heart text-danger" viewBox="0 0 16 16">
                                 <path fill-rule="evenodd" d="m8 2.42-.717-.737c-1.13-1.161-3.243-.777-4.01.72-.35.685-.451 1.707.236 3.062C4.16 6.753 5.52 8.32 8 10.042c2.479-1.723 3.839-3.29 4.491-4.577.687-1.355.587-2.377.236-3.061-.767-1.498-2.88-1.882-4.01-.721L8 2.42Zm-.49 8.5c-10.78-7.44-3-13.155.359-10.063.045.041.089.084.132.129.043-.045.087-.088.132-.129 3.36-3.092 11.137 2.624.357 10.063l.235.468a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3.177 3.177 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.235-.468ZM6.013 2.06c-.649-.18-1.483.083-1.85.798-.131.258-.245.689-.08 1.335.063.244.414.198.487-.043.21-.697.627-1.447 1.359-1.692.217-.073.304-.337.084-.398Z"></path>
                              </svg>
                              Sponsors
                           </a>
                        </li>
                     </ul>
                  </footer>
               </div>
            </div>
         </div>
      </template>
      <template id="auto-clicker-autofill-popup-tr">
         <tr>
            <td>
               <div class="text-truncate"></div>
            </td>
            <td>
               <div class="text-truncate"></div>
            </td>
            <td>
               <button type="button" class="btn-close" data-bs-dismiss="tr" aria-label="Close"></button>
            </td>
         </tr>
      </template>
   </body>
</html>