<?php
/*
Template Name: ContactForm
*/
?>

<?php get_header(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/contact-form/contactform.js"></script>

<div id="contact-form">
	<form id="contact">
                                  
            <p class="info_form">Field with <span class="asterisco">(*)</span> must be completed.</p>
                                  
            <label for="nome">Name <span class="asterisco">(*)</span></label>
            <input type="text" name="name" id="name"  placeholder="Your Name" />
                                  
            <label for="email">Email <span class="asterisco">(*)</span></label>
            <input type="text" name="email" id="email"  placeholder="Write your email" />
                                  
            <label for="oggetto">Object <span class="asterisco">(*)</span></label>
            <input type="text"  name="object" id="object"  placeholder="Di che tipo di informazione hai bisogno?"/>
                                  
            <label for="messaggio">Message <span class="asterisco">(*)</span></label>
            <textarea cols="50" rows="10" name="message" id="message"  placeholder="Write your message"></textarea>
                                  
            <input type="checkbox" name="privacy" id="privacy" value="privacy"/> Accept <a href="#" title="Read infos" class="read_infos">privacy and guide lines</a>.<br />
                                 
            <input type="text" id="hidden" name="hidden" style="display:none;"/><br />
                                         
            <input class="btn" type="button" id="contact-button" value="Send" />
                              
	</form>
</div>

<?php get_footer(); ?>