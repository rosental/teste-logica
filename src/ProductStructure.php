<?php

namespace App;

class ProductStructure
{
    const products = [
        "preto-PP",
        "preto-M",
        "preto-G",
        "preto-GG",
        "preto-GG",
        "branco-PP",
        "branco-G",
        "vermelho-M",
        "azul-XG",
        "azul-XG",
        "azul-XG",
        "azul-P"
    ];

    /**
     * Returns an array with the product quantity for each size by color.
     * @param array $products Products array with each item formated like: "color-size"
     * @param string $separator The separator used between the item's color and size.
     * @return array
     */
    private function getProductsQtyByColorAndSize(array $products, string $separator = "-"): array
    {
        $products_qty = [];

        foreach ($products as $product) {

            // Gets product info (Color and Size)
            $product_info = explode($separator, $product);
            $color = $product_info[0];
            $size = $product_info[1];

            // If the qty for the size variant already exists, increments it. Otherwise creates a new entry.
            if (!empty($products_qty[$color][$size])) {
                $products_qty[$color][$size]++;
            } else {
                $products_qty[$color][$size] = 1;
            }
        }

        return $products_qty;
    }

    public function make(): array
    {
        return $this->getProductsQtyByColorAndSize(self::products);
    }
}