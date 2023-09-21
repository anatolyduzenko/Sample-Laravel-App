<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProductAPIRequest;
use App\Http\Requests\API\UpdateProductAPIRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class ProductAPIController
 */
class ProductAPIController extends AppBaseController
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Products.
     * GET|HEAD /products
     * @OA\Get(
     *      path="/api/products",
     *      operationId="List Products",
     *      tags={"Products"},
     *      summary="List Products",
     *      description="Display a listing of the Products.",
     *      @OA\Parameter(
     *          description="Skip prodcuts",
     *          in="path",
     *          name="skip",
     *          required=false,
     *          @OA\Schema(type="integer"),
     *          @OA\Examples(example="integer", value="1", summary="An integer value"),
     *      ),
     *      @OA\Parameter(
     *          description="Limit prodcuts",
     *          in="path",
     *          name="limit",
     *          required=false,
     *          @OA\Schema(type="integer"),
     *          @OA\Examples(example="integer", value="1", summary="An integer value"),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Response Message",
     *       ),
     *     )
     */
    public function index(Request $request): JsonResponse
    {
        $products = $this->productRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($products->toArray(), 'Products retrieved successfully');
    }

    /**
     * Store a newly created Product in storage.
     * POST /products
     */
    public function store(CreateProductAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $product = $this->productRepository->create($input);

        return $this->sendResponse($product->toArray(), 'Product saved successfully');
    }

    /**
     * Display a listing of the Products.
     * GET /products
     * @OA\Get(
     *      path="/api/products/{id}",
     *      operationId="Show Product",
     *      tags={"Products"},
     *      summary="Show Product",
     *      description="Display detailed information for product.",
     *      @OA\Parameter(
     *          description="Product ID",
     *          in="path",
     *          name="skip",
     *          required=false,
     *          @OA\Schema(type="integer"),
     *          @OA\Examples(example="integer", value="1", summary="An integer value"),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Response Message",
     *       ),
     *     )
     */
    public function show($id): JsonResponse
    {
        /** @var Product $product */
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            return $this->sendError('Product not found');
        }

        return $this->sendResponse($product->toArray(), 'Product retrieved successfully');
    }

    /**
     * Update the specified Product in storage.
     * PUT/PATCH /products/{id}
     */
    public function update($id, UpdateProductAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Product $product */
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            return $this->sendError('Product not found');
        }

        $product = $this->productRepository->update($input, $id);

        return $this->sendResponse($product->toArray(), 'Product updated successfully');
    }

    /**
     * Remove the specified Product from storage.
     * DELETE /products/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Product $product */
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            return $this->sendError('Product not found');
        }

        $product->delete();

        return $this->sendSuccess('Product deleted successfully');
    }
}
