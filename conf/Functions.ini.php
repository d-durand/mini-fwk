<?php

/**
 * Remplace le premier pattern rencontré.
 * @link http://infocontact.github.io/ic-fwk/doc/function-InfoContact.IcFwk.str_replace_first.html
 * @param string $search <p>Le terme recherché</p>
 * @param string $replace <p>Le terme de remplacement</p>
 * @param string $subject <p>La châine de recherche</p>
 * @return string <p>La chaine avec le terme remplacé</p>
 */
function str_replace_first($search, $replace, $subject) {
    $pos = strpos($subject, $search);
    if ($pos !== false) {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }
    return $subject;
}
