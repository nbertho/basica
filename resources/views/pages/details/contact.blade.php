{{--

  Détails de la page de contact (id = 4)

  Variable : $page: OBJ(id, titre, slug, sousTitre, texte, tri, created_at, updated_at)

--}}


<div class="section section-map">
  <div class="col-sm-12" style="padding:0;">
    <!-- Map -->
      <div id="contact-us-map">
        <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
          <br />
          <small>
            <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
          </small>
        </iframe>
      </div>
    <!-- End Map -->
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row">
      <h3>Get in Touch with Us</h3>
      </hr>
      <div class="col-sm-6">
        <!-- Contact Info -->
        <p class="contact-us-details">
          {!! html_entity_decode($page->texte) !!}
        </p>
        <!-- End Contact Info -->
      </div>
      <div class="col-sm-6">

      </div>
    </div>
  </div>
</div>
