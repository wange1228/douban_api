<?php
class Rule {
    private static $amazon = array(
        array(
            "match" => "$('#productTitle').length !== 0",
            "tagIsbn" => "#detail_bullets_id",
            "tagTitle" => "#productTitle",
            "type" => "book",
            "event" => "pageload"
        ),
        array(
            "match" => "$('#ebooksProductTitle').length !== 0",
            "tagIsbn" => "body",
            "tagTitle" => "#ebooksProductTitle",
            "type" => "book",
            "event" => "pageload"
        ),
        array(
            "match" => "/\/gp\/product\//i",
            "tag" => ".zg_item_compact, .a-spacing-medium.p13n-sc-list-item, .a-carousel-card, .rhf-RVIs, .floor-hotasin-item, .a-fixed-left-grid-col, .a-link-normal",
            "type" => "book",
            "event" => "mouseover"
        ),
        array(
            "match" => "/\/dp\//i",
            "tag" => ".a-carousel-card, #recentlyViewed td.text, .ch-tabwidget-pc-contentAsin, .feed-carousel-card, .a-fixed-left-grid-col .a-link-normal, .a-unordered-list .a-link-normal, .acsUxWidget .bxc-grid__column",
            "type" => "book",
            "event" => "mouseover"
        )
    );

    private static $dangdang = array(
        array(
            "match" => "$.trim($('.breadcrumb a').eq(0).text()) === '图书' && $('.name_info h1').length !== 0",
            "tagIsbn" => "#detail_describe",
            "tagTitle" => ".name_info h1",
            "type" => "book",
            "event" => "pageload"
        ),
        array(
            "match" => "/\b2\d{7}\.html/i",
            "tag" => ".group_buy .over li, .mbox_another .over li, .product_content .aside li",
            "type" => "book",
            "event" => "mouseover"
        ),
        array(
            "match" => "/product\.dangdang\.com\/2\d{7}.*\.html/i",
            "tag" => ".product_ul li, .list_aa li, .list_ab li, .content li, .shoplist .pic",
            "type" => "book",
            "event" => "mouseover"
        ),
        array(
            "match" => "/a\.dangdang\.com\/jump\.php\?.*/i",
            "tag" => ".product_content .aside li",
            "type" => "book",
            "event" => "mouseover"
        ),
        array(
            "match" => "/\/product\/\.\/\d+\.html/i",
            "tag" => ".limitCell, .bookCell, .bigCell, .topRightBookCell a, .list_content .book_content",
            "type" => "book",
            "event" => "mouseover"
        )
    );

    private static $jd = array(
        array(
            "match" => "(window.location.host === 'item.jd.com') && $.trim($('.breadcrumb strong a').text()) === '图书'",
            "tagIsbn" => "#parameter2",
            "tagTitle" => "#name h1",
            "type" => "book",
            "event" => "pageload"
        ),
        array(
            "match" => "(window.location.host === 'e.jd.com') && ($('.bookInfo').length > 0)",
            "tagIsbn" => ".bookInfo",
            "tagTitle" => ".sku-name",
            "type" => "book",
            "event" => "pageload"
        )
    );

    public function __construct() {
        set_time_limit(0);
        date_default_timezone_set("Asia/Shanghai");
    }

    public function get_rule($host) {
        $rule = array();
        switch($host) {
            case "www.amazon.cn":
                $rule = self::$amazon;
            break;

            case "www.dangdang.com":
            case "product.dangdang.com":
            case "book.dangdang.com":
            case "v.dangdang.com":
            case "e.dangdang.com":
            case "category.dangdang.com":
                $rule = self::$dangdang;
            break;

            case "item.jd.com":
            case "re.jd.com":
            case "e.jd.com":
            case "book.jd.com":
            case "list.jd.com":
            case "search.jd.com":
                $rule = self::$jd;
            break;
        }

        return $rule;
    }
}
?>
