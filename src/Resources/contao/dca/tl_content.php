<?php

use Contao\Input;

if (Input::get("do") === "mega_menu") {
    $GLOBALS["TL_DCA"]["tl_content"]["config"]["ptable"] = "tl_mega_menu";
    $GLOBALS["TL_DCA"]["tl_content"]["list"]["sorting"]["headerFields"] = [
        "name",
    ];
}

// Produkt Box
$GLOBALS["TL_DCA"]["tl_content"]["palettes"]["product_box_single"] = '
    {type_legend},type,headline;
    {text_legend},text;
    {image_legend},addProduktImage;
    {link_legend},addGlobalLink;
    {expert_legend:hide},cssID;
    {invisible_legend:hide},invisible,start,stop;
';
$GLOBALS["TL_DCA"]["tl_content"]["palettes"]["__selector__"][] =
    "addProduktImage";
$GLOBALS["TL_DCA"]["tl_content"]["subpalettes"]["addProduktImage"] =
    "singleSRC";
$GLOBALS["TL_DCA"]["tl_content"]["fields"]["addProduktImage"] = [
    "inputType" => "checkbox",
    "eval" => ["submitOnChange" => true, "tl_class" => "w100 m12 cbx"],
    "sql" => ["type" => "boolean", "default" => false],
];
$GLOBALS["TL_DCA"]["tl_content"]["palettes"]["__selector__"][] =
    "addGlobalLink";
$GLOBALS["TL_DCA"]["tl_content"]["subpalettes"]["addGlobalLink"] =
    "url,target,titleText";
$GLOBALS["TL_DCA"]["tl_content"]["fields"]["addGlobalLink"] = [
    "inputType" => "checkbox",
    "eval" => ["submitOnChange" => true, "tl_class" => "w100 m12 cbx"],
    "sql" => ["type" => "boolean", "default" => false],
];

// Content Box Start
$GLOBALS["TL_DCA"]["tl_content"]["palettes"]["content_box_start"] = '
    {type_legend},type;
    {content_box_properties},content_box_properties_width,content_box_properties_pt,content_box_properties_pb,content_box_properties_mt,content_box_properties_mb;
    {content_box_background},content_box_background_color,content_box_background_color_custom,addContentBoxImage;
    {content_box_content},content_box_content_color_inverted,content_box_content_text_align;
    {expert_legend:hide},cssID;
    {invisible_legend:hide},invisible,start,stop;
';
$GLOBALS["TL_DCA"]["tl_content"]["palettes"]["__selector__"][] =
    "addContentBoxImage";
$GLOBALS["TL_DCA"]["tl_content"]["subpalettes"]["addContentBoxImage"] =
    "singleSRC,content_box_background_parallax,content_box_background_overlay";
$GLOBALS["TL_DCA"]["tl_content"]["fields"]["addContentBoxImage"] = [
    "inputType" => "checkbox",
    "eval" => ["submitOnChange" => true, "tl_class" => "w50 m12"],
    "sql" => ["type" => "boolean", "default" => false],
];
$GLOBALS["TL_DCA"]["tl_content"]["fields"]["content_box_properties_width"] = [
    "label" =>
        &$GLOBALS["TL_LANG"]["tl_content"]["content_box_properties_width"],
    "inputType" => "select",
    "options" => [
        "" => "100%",
        "centered" => "75rem",
    ],
    "sql" => [
        "type" => "string",
        "length" => 8,
        "default" => "",
    ],
    "eval" => ["tl_class" => "w50"],
];
$GLOBALS["TL_DCA"]["tl_content"]["fields"]["content_box_properties_pt"] = [
    "label" => &$GLOBALS["TL_LANG"]["tl_content"]["content_box_properties_pt"],
    "inputType" => "select",
    "options" => [
        "" => "0px",
        "pt-16" => "16px",
        "pt-32" => "32px",
        "pt-48" => "48px",
        "pt-64" => "64px",
        "pt-96" => "96px",
        "pt-128" => "128px",
    ],
    "sql" => [
        "type" => "string",
        "length" => 5,
        "default" => "",
    ],
    "eval" => ["tl_class" => "clr w50"],
];
$GLOBALS["TL_DCA"]["tl_content"]["fields"]["content_box_properties_pb"] = [
    "label" => &$GLOBALS["TL_LANG"]["tl_content"]["content_box_properties_pb"],
    "inputType" => "select",
    "options" => [
        "" => "0px",
        "pb-16" => "16px",
        "pb-32" => "32px",
        "pb-48" => "48px",
        "pb-64" => "64px",
        "pb-96" => "96px",
        "pb-128" => "128px",
    ],
    "sql" => [
        "type" => "string",
        "length" => 5,
        "default" => "",
    ],
    "eval" => ["tl_class" => "w50"],
];
$GLOBALS["TL_DCA"]["tl_content"]["fields"]["content_box_properties_mt"] = [
    "label" => &$GLOBALS["TL_LANG"]["tl_content"]["content_box_properties_mt"],
    "inputType" => "select",
    "options" => [
        "" => "0px",
        "mt-16" => "16px",
        "mt-32" => "32px",
        "mt-48" => "48px",
        "mt-64" => "64px",
        "mt-96" => "96px",
        "mt-128" => "128px",
    ],
    "sql" => [
        "type" => "string",
        "length" => 5,
        "default" => "",
    ],
    "eval" => ["tl_class" => "w50"],
];
$GLOBALS["TL_DCA"]["tl_content"]["fields"]["content_box_properties_mb"] = [
    "label" => &$GLOBALS["TL_LANG"]["tl_content"]["content_box_properties_mb"],
    "inputType" => "select",
    "options" => [
        "" => "0px",
        "mb-16" => "16px",
        "mb-32" => "32px",
        "mb-48" => "48px",
        "mb-64" => "64px",
        "mb-96" => "96px",
        "mb-128" => "128px",
    ],
    "sql" => [
        "type" => "string",
        "length" => 5,
        "default" => "",
    ],
    "eval" => ["tl_class" => "w50"],
];
$GLOBALS["TL_DCA"]["tl_content"]["fields"]["content_box_background_color"] = [
    "label" =>
        &$GLOBALS["TL_LANG"]["tl_content"]["content_box_background_color"],
    "inputType" => "select",
    "options" => [
        "ffffff" => "-",
        "ececec" => "hellgrau",
        "252525" => "grau",
        "0d5289" => "blau",
    ],
    "sql" => [
        "type" => "string",
        "length" => 6,
        "default" => "ffffff",
    ],
    "eval" => ["tl_class" => "w50"],
];
$GLOBALS["TL_DCA"]["tl_content"]["fields"][
    "content_box_background_color_custom"
] = [
    "label" =>
        &$GLOBALS["TL_LANG"]["tl_content"][
            "content_box_background_color_custom"
        ],
    "inputType" => "text",
    "sql" => [
        "type" => "string",
        "length" => 6,
        "default" => "",
    ],
    "eval" => [
        "tl_class" => "w50",
        "isHexColor" => true,
        "maxlength" => 6,
        "minlength" => 6,
    ],
];
$GLOBALS["TL_DCA"]["tl_content"]["fields"][
    "content_box_background_parallax"
] = [
    "label" =>
        &$GLOBALS["TL_LANG"]["tl_content"]["content_box_background_parallax"],
    "inputType" => "checkbox",
    "sql" => [
        "type" => "boolean",
        "default" => false,
    ],
    "eval" => ["tl_class" => "w50 cbx m12"],
];
$GLOBALS["TL_DCA"]["tl_content"]["fields"]["content_box_background_overlay"] = [
    "label" =>
        &$GLOBALS["TL_LANG"]["tl_content"]["content_box_background_overlay"],
    "inputType" => "select",
    "options" => [
        "" => "0%",
        "overlay-40" => "40%",
        "overlay-60" => "60%",
        "overlay-80" => "80%",
    ],
    "sql" => [
        "type" => "string",
        "length" => 10,
        "default" => "",
    ],
    "eval" => ["tl_class" => "w50"],
];
$GLOBALS["TL_DCA"]["tl_content"]["fields"][
    "content_box_content_color_inverted"
] = [
    "label" =>
        &$GLOBALS["TL_LANG"]["tl_content"][
            "content_box_content_color_inverted"
        ],
    "inputType" => "checkbox",
    "sql" => [
        "type" => "boolean",
        "default" => false,
    ],
    "eval" => ["tl_class" => "w50 cbx m12"],
];
$GLOBALS["TL_DCA"]["tl_content"]["fields"]["content_box_content_text_align"] = [
    "label" =>
        &$GLOBALS["TL_LANG"]["tl_content"]["content_box_content_text_align"],
    "inputType" => "select",
    "options" => [
        "" => "Links",
        "center" => "Zentriert",
        "right" => "Rechts",
    ],
    "sql" => [
        "type" => "string",
        "length" => 6,
        "default" => "",
    ],
    "eval" => ["tl_class" => "w50"],
];

// Content Box Stop

$GLOBALS["TL_DCA"]["tl_content"]["palettes"]["content_box_stop"] = '
    {type_legend},type;
    {invisible_legend:hide},invisible,start,stop;
';
