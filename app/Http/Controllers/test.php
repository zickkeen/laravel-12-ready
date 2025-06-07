<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function index()
    {
        // Return json test data

        return response()->json([
            'status' => 'success',
            'message' => 'Test data retrieved successfully',
            'data' => [
                'id' => 1,
                'name' => 'Test Item',
                'description' => 'This is a test item for demonstration purposes.',
            ],
        ]);
    }
    public function show($id)
    {
        // Return json test data for a specific item

        return response()->json([
            'status' => 'success',
            'message' => 'Test item retrieved successfully',
            'data' => [
                'id' => $id,
                'name' => 'Test Item ' . $id,
                'description' => 'This is a test item with ID ' . $id,
            ],
        ]);
    }
    public function create()
    {
        // Return json response for creating a new item

        return response()->json([
            'status' => 'success',
            'message' => 'Ready to create a new test item',
        ]);
    }
    public function update($id)
    {
        // Return json response for updating an item

        return response()->json([
            'status' => 'success',
            'message' => 'Test item with ID ' . $id . ' updated successfully',
        ]);
    }
    public function delete($id)
    {
        // Return json response for deleting an item

        return response()->json([
            'status' => 'success',
            'message' => 'Test item with ID ' . $id . ' deleted successfully',
        ]);
    }
    public function error()
    {
        // Return json error response

        return response()->json([
            'status' => 'error',
            'message' => 'An error occurred while processing your request',
        ], 500);
    }
    public function notFound()
    {
        // Return json not found response

        return response()->json([
            'status' => 'error',
            'message' => 'The requested resource was not found',
        ], 404);
    }
    public function unauthorized()
    {
        // Return json unauthorized response

        return response()->json([
            'status' => 'error',
            'message' => 'You are not authorized to access this resource',
        ], 401);
    }
    public function forbidden()
    {
        // Return json forbidden response

        return response()->json([
            'status' => 'error',
            'message' => 'You do not have permission to access this resource',
        ], 403);
    }
    public function validationError()
    {
        // Return json validation error response

        return response()->json([
            'status' => 'error',
            'message' => 'Validation failed for the provided data',
            'errors' => [
                'name' => 'The name field is required.',
                'description' => 'The description field must be at least 10 characters.',
            ],
        ], 422);
    }
    public function customResponse()
    {
        // Return a custom json response

        return response()->json([
            'status' => 'custom',
            'message' => 'This is a custom response with additional data',
            'data' => [
                'customField1' => 'Custom Value 1',
                'customField2' => 'Custom Value 2',
            ],
        ]);
    }
    public function noContent()
    {
        // Return a no content response

        return response()->json(null, 204);
    }
    public function redirect()
    {
        // Return a redirect response

        return response()->json([
            'status' => 'redirect',
            'message' => 'You are being redirected to another resource',
            'redirect_url' => url('/another-resource'),
        ]);
    }
    public function rateLimitExceeded()
    {
        // Return a rate limit exceeded response

        return response()->json([
            'status' => 'error',
            'message' => 'Rate limit exceeded. Please try again later.',
        ], 429);
    }
    public function conflict()
    {
        // Return a conflict response

        return response()->json([
            'status' => 'error',
            'message' => 'A conflict occurred while processing your request',
        ], 409);
    }
    public function internalServerError()
    {
        // Return an internal server error response

        return response()->json([
            'status' => 'error',
            'message' => 'An internal server error occurred. Please try again later.',
        ], 500);
    }
    public function serviceUnavailable()
    {
        // Return a service unavailable response

        return response()->json([
            'status' => 'error',
            'message' => 'The service is currently unavailable. Please try again later.',
        ], 503);
    }
    public function customStatusCode()
    {
        // Return a custom status code response

        return response()->json([
            'status' => 'custom',
            'message' => 'This is a response with a custom status code',
        ], 418); // I'm a teapot
    }
    public function customHeaders()
    {
        // Return a response with custom headers

        return response()->json([
            'status' => 'success',
            'message' => 'Response with custom headers',
        ])->header('X-Custom-Header', 'CustomValue')
          ->header('X-Another-Header', 'AnotherValue');
    }
    public function jsonpResponse()
    {
        // Return a JSONP response

        $data = [
            'status' => 'success',
            'message' => 'This is a JSONP response',
            'data' => [
                'id' => 1,
                'name' => 'JSONP Item',
            ],
        ];

        return response()->jsonp('callback', $data);
    }
    public function cacheControl()
    {
        // Return a response with cache control headers

        return response()->json([
            'status' => 'success',
            'message' => 'Response with cache control headers',
        ])->header('Cache-Control', 'max-age=3600, public');
    }
}