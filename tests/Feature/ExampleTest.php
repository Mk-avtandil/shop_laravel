<?php

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;


it('redirect to login page if user not registered', function () {
    $response = $this->get(route('dashboard'));
    $response->assertRedirect(route('login'));
});

#----product----
it('returns index product page', function () {
    $response = $this->get(route('product.index'));
    $response->assertStatus(200);
});

it('returns create product page', function () {
    $response = $this->get(route('product.create'));
    $response->assertStatus(200);
});

/* Этот тест гарантирует, что продукт не будет сохранен, если категория,
на которую ссылается, не существует в базе данных */
it('can save a product', function () {
    $productData = [
        'name' => 'Product 1',
        'price' => 100,
        'description' => 'Product 1 description',
        'category_id' => 999999
    ];

    $response = $this->postJson(route('product.save'), $productData);
    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['category_id']);
});

//it('can delete a product', function () {
//   $product = Product::factory()->create();
//   $response = $this->delete(route('product.delete', $product->id));
//   $response->assertStatus(200);
//   $this->assertDatabaseMissing('products', ['id' => $product->id]);
//});

//it('returns detail product page', function () {
//    $response = $this->get(route('product.detail', ['id' => 1]));
//    $response->assertStatus(422);
//});

//it('returns edit product page', function () {
//    $response = $this->get(route('product.edit', ['id' => 1]));
//    $response->assertStatus(200);
//});

//it('can update a product', function () {
//    $product = Product::factory()->create();
//    $updatedData = [
//        'name' => 'Updated Product updated',
//        'price' => 100,
//        'description' => 'Product updated description',
//        'category_id' => 999999
//    ];
//
//    $response = $this->putJson(route('product.update', $product->id), $updatedData);
//    $response->assertStatus(200);
//    $response->assertDataBaseHas('product', array_merge(['id' => $product->id], $updatedData));
//});

#----category----
it('returns index category page', function () {
    $response = $this->get(route('category.index'));
    $response->assertStatus(200);
});

it('returns create category page', function () {
    $response = $this->get(route('category.create'));
    $response->assertStatus(200);
});

//it('can save a category', function () {
//    $categoryData = [
//        'name' => 'Category test 1',
//    ];
//
//    $response = $this->postJson(route('category.save'), $categoryData);
//    $response->assertStatus(201);
//    $this->assertDatabaseHas('categories', $categoryData);
//});

//it('can delete a category', function () {
//   $category = Category::factory()->create();
//   $response = $this->delete(route('category.delete', $category->id));
//   $response->assertStatus(200);
//   $this->assertDatabaseMissing('categories', ['id' => $category->id]);
//});

//it('returns edit category page', function () {
//    $response = $this->get(route('category.edit', ['id' => 1]));
//    $response->assertStatus(200);
//});

//it('can update a category', function () {
//    $category = Category::factory()->create();
//    $updatedData = [
//        'name' => 'Updated Category new',
//    ];
//
//    $response = $this->putJson(route('category.update', $category->id), $updatedData);
//    $response->assertStatus(200);
//    $response->assertDataBaseHas('categories', array_merge(['id' => $category->id], $updatedData));
//});

#----cart----
it('returns index cart page', function () {
    $response = $this->get(route('cart.index'));
    $response->assertStatus(200);
});

//it('can save a product to cart', function () {
//    $cartData = [
//        'product_id' => 1,
//        'quantity' => 1
//    ];
//    $response = $this->postJson(route('cart.add'), $cartData);
//    $response->assertStatus(201);
//    $this->assertDatabaseHas('cart', $cartData);
//});

//it('can trancae the cart', function () {
//    Cart::insert([
//        'product_id' => 1,
//        'quantity' => 1,
//    ]);
//
//    $this->assertDatabaseCount('carts', 1);
//    Cart::truncate();
//    $this->assertDatabaseCount('carts', 0);
//});
