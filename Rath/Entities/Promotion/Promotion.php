<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 3/08/2015
 * Time: 18:06
 */

namespace Rath\Entities\Promotion;


class Promotion
{
    const TABLE_NAME = "promotion";

    const ID_COL = "id";
    const PROMOTION_TYPE_ID_COL = "promotiontypeId";
    const RESTAURANT_ID_COL = "restaurantId";

    const NAME_COL = "name";
    const FROM_DATE_COL = "fromDate";
    const TO_DATE_COL = "toDate";
    const DESCRIPTION_COL = "description";
    const DISCOUNT_TYPE_COL = "discountType";
        const DISCOUNT_TYPE_VAL_PERS = "Percentage";
        const DISCOUNT_TYPE_VAL_AMOUNT = "Amount";
    const DISCOUNT_AMOUNT_COL = "discountAmount";
    const LOYALTY_POINTS_COL ="loyaltyPoints";

    public $id;
    public $promotiontypeId;
    public $restaurantId;

    //Used for updating linked products.
    public $productId;

    public $name;
    public $fromDate;
    public $toDate;
    public $description;
    public $discountType;
    public $discountAmount;
    public $loyaltyPoints;



    /**
     * @param $promotion Promotion
     * @return array
     */
    public static function toDbArray($promotion)
    {
        return [
            Promotion::NAME_COL => $promotion->name,
            Promotion::PROMOTION_TYPE_ID_COL => $promotion->promotiontypeId,
            Promotion::RESTAURANT_ID_COL => $promotion->restaurantId,
            Promotion::FROM_DATE_COL => $promotion->fromDate,
            Promotion::TO_DATE_COL => $promotion->toDate,
            Promotion::DESCRIPTION_COL => $promotion->description,
            Promotion::DISCOUNT_TYPE_COL => $promotion->discountType,
            Promotion::DISCOUNT_AMOUNT_COL => $promotion->discountAmount,
            Promotion::LOYALTY_POINTS_COL => $promotion->loyaltyPoints
        ];
    }

}
