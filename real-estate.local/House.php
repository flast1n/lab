<?php

class House
{
    public float $price;
    public string $title;
    public string $address;
    public string $phone;
    public string $image;
    public int $bedrooms;
    public int $bathrooms;

    public function __construct(
        float $price,
        string $title,
        string $address,
        string $phone,
        string $image,
        int $bedrooms,
        int $bathrooms
    ) {
        $this->price = $price;
        $this->title = $title;
        $this->address = $address;
        $this->phone = $phone;
        $this->image = $image;
        $this->bedrooms = $bedrooms;
        $this->bathrooms = $bathrooms;
    }

    public function getFormattedPrice(): string
    {
        return '$' . number_format($this->price, 0, '.', ' ');
    }

    public function getDiscountedPrice(int $discountPercent): string
    {
        $discounted = $this->price * (1 - ($discountPercent / 100));
        return '$' . number_format($discounted, 0, '.', ' ');
    }
}