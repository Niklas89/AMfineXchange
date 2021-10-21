<?php
$this->set('documentData', array(
    'xmlns:dc' => 'http://purl.org/dc/elements/1.1/'));

$this->set('channelData', array(
    'title' => __("AmfineXchange"),
    'link' => $this->Html->url('/', true),
    'description' => __("Les derniers documents disponibles sur AmfineXchange.com"),
    'language' => 'fr-fra'));


App::uses('Sanitize', 'Utility');

foreach ($pages as $post) {
    $postTime = strtotime($post['Page']['created']);



    // This is the part where we clean the body text for output as the description
    // of the rss item, this needs to have only text to make sure the feed validates

    $bodyText = strip_tags(preg_replace('=\(.*?\)=is', '', $post['Page']['content']));
    $bodyText = $this->Text->stripLinks($bodyText);
    $bodyText = Sanitize::stripAll($bodyText);
    $bodyText = $this->Text->truncate($bodyText, 3000, array(
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ));

    echo  $this->Rss->item(array(), array(
        'title' => $post['Page']['name'],
        'link' => 'http://www.amfinexchange.com/pages/show/'.$post['Page']['id'],
        'guid' => array('url' => 'http://www.amfinexchange.com/pages/show/'.$post['Page']['id'], 'isPermaLink' => 'true'),
        'description' => $bodyText,
        'dc:creator' => $post['User']['firstname']." ".$post['User']['lastname'],
        'pubDate' => $post['Page']['created']
    ));
}