<?php

/**
 * Template part for Popup.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Qata_Alpaca_Theme
 */

$popup_title = get_field('popup_title', 'option');
$popup_content = get_field('popup_content', 'option');
if ($popup_content || $popup_title) :
?>
  <section class="message-popup | hidden">
    <div class="message-popup__wraper | bg-black bg-opacity-80 | fixed w-full h-full | flex justify-center items-center | z-[120]">
      <div class="message-popup__card | relative | min-h-[100px] min-w-[100px] max-w-[800px] h-fit w-fit | bg-white border-2 border-cuper text-cuper | p-8">
        <div class="message-popup__card__close-button | after:content-['|'] before:content-['|'] before:absolute after:absolute before:rotate-45 after:-rotate-45 | absolute right-8 top-4 | cursor-pointer"></div>
        <div class="message-popup__card__content">
          <div class="message-popup__card__content__title | font-bold text-xl text-center | mx-4 mb-6">
            <?php
            echo get_field('popup_title', 'option');
            ?>
          </div>
          <div class="message-popup__card__content__text">
            <?php
            echo get_field('popup_content', 'option');
            ?>
          </div>

        </div>
      </div>
    </div>
    <style>
      .message-popup__card__content__text p:not(:last-child) {
        margin-bottom: 16px;
      }

      .message-popup__card__content__text ol:not(:last-child) {
        margin-bottom: 16px;
      }

      .message-popup__card__content__text li:not(:last-child) {
        margin-bottom: 16px;
      }

      .message-popup__card__content__text ol {
        list-style-type: decimal;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;
      }
    </style>
    <script>
      const popupEl = document.querySelector('.message-popup');
      const popupButton = popupEl.querySelector('.message-popup__card__close-button');

      const startedSession = sessionStorage.getItem('startedSession');
      if (!startedSession) {
        popupEl.classList.remove('hidden')
        sessionStorage.setItem('startedSession', true);
      }

      popupButton.addEventListener('click', () => {
        popupEl.classList.add('hidden')
      })
    </script>
  </section>
<?php
endif;
?>