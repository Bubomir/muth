		
		<footer>
			<div class="muth-container">
        <div class="muth-main-footer">
          <div class="muth-footer-text-moto">
            <img src="img/Logo.png">
            <hr>
            <p>Páčia sa vám naše práce a chceli by ste využiť naše služby? Vyžiadajte si cenovú kalkuláciu, poraďte sa s nami, alebo nám hoci iba napíšte "Ahoj", potešíme sa!</p>
            <h4>Príjímame nové zákazky</h4>
          </div>
          <div class="muth-footer-sitemap">
            <h3>Mapa stránky</h3>
            <hr>
            <ul>
              <?php wp_nav_menu(array('theme_location' => 'secondary')); ?>
            </ul>
          </div>
          <div class="muth-contact">
            <h3>Kontakt</h3>
            <hr>
            <div class="muth-footer-table">
              <table>
                <tr>
                <?php print_r(get_sidebar());?>
                  <td class="muth-footer-phone">Telefón:</td>
                  <td><a href="">+421 902 999 333</a></td>
                </tr>
                <tr>
                  <td class="muth-footer-mail">Email:</td>
                  <td><a href="">test.test@gmail.com</a></td>
                </tr>
                <tr>
                  <td class="muth-footer-address">Adresa:</td>
                  <td><a href="">test.skype</a></td>
                </tr>
              </table>
            </div>
            <a href="" class="muth-icon-fb">
              
            </a>
            <a href="" id="muth-icon-twitter" class="muth-icon"><svg enable-background="new 0 0 32 32" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Outline_Color_copy_2"><path d="M28,1c1.654,0,3,1.346,3,3v24c0,1.654-1.346,3-3,3H4c-1.654,0-3-1.346-3-3V4c0-1.654,1.346-3,3-3H28 M28,0H4   C1.8,0,0,1.8,0,4v24c0,2.2,1.8,4,4,4h24c2.2,0,4-1.8,4-4V4C32,1.8,30.2,0,28,0L28,0z"/><path d="M18.328,8.56c-1.663,0.605-2.714,2.166-2.594,3.874l0.04,0.659l-0.665-0.081c-2.421-0.309-4.537-1.358-6.333-3.121   L7.897,9.017L7.671,9.663c-0.479,1.439-0.173,2.96,0.825,3.982c0.532,0.565,0.412,0.646-0.505,0.309   c-0.319-0.107-0.599-0.188-0.625-0.148c-0.093,0.095,0.226,1.318,0.479,1.803c0.346,0.673,1.051,1.331,1.823,1.722l0.652,0.309   l-0.771,0.013c-0.745,0-0.771,0.013-0.691,0.297c0.266,0.874,1.317,1.803,2.488,2.206l0.825,0.282l-0.718,0.431   c-1.064,0.62-2.315,0.969-3.566,0.995c-0.599,0.013-1.091,0.067-1.091,0.108c0,0.134,1.624,0.887,2.568,1.184   c2.834,0.874,6.2,0.497,8.728-0.996c1.796-1.063,3.592-3.175,4.431-5.22c0.453-1.089,0.905-3.08,0.905-4.034   c0-0.619,0.04-0.7,0.785-1.439c0.439-0.43,0.851-0.901,0.931-1.036c0.133-0.256,0.119-0.256-0.559-0.027   c-1.131,0.404-1.291,0.35-0.731-0.255c0.412-0.43,0.905-1.211,0.905-1.439c0-0.04-0.199,0.027-0.426,0.148   c-0.239,0.135-0.771,0.337-1.171,0.457L22.44,9.543l-0.652-0.444c-0.359-0.242-0.864-0.511-1.131-0.592   C19.978,8.318,18.94,8.345,18.328,8.56z"/></g></svg>
            </a>
            <a href="" id="muth-icon-linkedin" class="muth-icon"><svg enable-background="new 0 0 32 32" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Outline_Color_copy_2"><path d="M28,1c1.654,0,3,1.346,3,3v24c0,1.654-1.346,3-3,3H4c-1.654,0-3-1.346-3-3V4c0-1.654,1.346-3,3-3H28 M28,0H4   C1.8,0,0,1.8,0,4v24c0,2.2,1.8,4,4,4h24c2.2,0,4-1.8,4-4V4C32,1.8,30.2,0,28,0L28,0z"/><path d="M24.299,23.921v-6.137c0-3.288-1.755-4.818-4.096-4.818c-1.889,0-2.735,1.039-3.206,1.768v-1.517h-3.558   c0.047,1.005,0,10.704,0,10.704h3.558v-5.978c0-0.319,0.023-0.639,0.117-0.867c0.257-0.639,0.842-1.301,1.825-1.301   c1.288,0,1.803,0.981,1.803,2.42v5.727L24.299,23.921L24.299,23.921z M9.69,11.756c1.24,0,2.013-0.823,2.013-1.85   c-0.023-1.05-0.773-1.849-1.99-1.849S7.701,8.856,7.701,9.906c0,1.028,0.772,1.85,1.967,1.85H9.69z M11.469,23.921V13.217H7.912   v10.704H11.469z"/></g></svg>
            </a>
            <a href="" id="muth-icon-rss" class="muth-icon"><svg enable-background="new 0 0 32 32" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Outline_Color_copy_2"><path d="M28,1c1.654,0,3,1.346,3,3v24c0,1.654-1.346,3-3,3H4c-1.654,0-3-1.346-3-3V4c0-1.654,1.346-3,3-3H28 M28,0H4   C1.8,0,0,1.8,0,4v24c0,2.2,1.8,4,4,4h24c2.2,0,4-1.8,4-4V4C32,1.8,30.2,0,28,0L28,0z"/><path d="M21.116,24.314h3.198c0-9.169-7.459-16.633-16.627-16.633v3.189C15.09,10.869,21.116,16.902,21.116,24.314z M9.901,24.32   c1.226,0,2.217-0.985,2.217-2.206c0-1.214-0.991-2.211-2.217-2.211c-1.221,0-2.214,0.996-2.214,2.211   C7.686,23.335,8.679,24.32,9.901,24.32z M15.463,24.315L15.463,24.315h3.202c0-6.056-4.926-10.981-10.979-10.981v3.188   c2.076,0,4.029,0.811,5.498,2.283C14.653,20.271,15.463,22.232,15.463,24.315z"/></g></svg>
            </a>
          </div>
        </div>
      </div>
      <div class="muth-secondary-footer">
        <h4>&copy Všetky práva vyhradené Muth v.o.s</h4>
      </div> 
			
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>