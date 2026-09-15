<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContentApiController extends Controller
{
    /**
     * Legacy compatible content retrieval endpoint
     */
    public function getContent(Request $request): JsonResponse
    {
        $type = $request->query('type', 'blogs');
        $slug = $request->query('slug');

        if ($type === 'blogs' || $type === 'posts') {
            if ($slug) {
                $post = Post::where('slug', $slug)->where('status', 'published')->first();
                if (!$post) {
                    return response()->json(['success' => false, 'message' => 'Post not found'], 404);
                }
                return response()->json(['success' => true, 'data' => $post->toViewArray()]);
            }

            $posts = Post::where('status', 'published')
                ->orderByDesc('published_at')
                ->get()
                ->map(fn(Post $p) => $p->toViewArray());

            return response()->json(['success' => true, 'data' => $posts]);
        }

        if ($type === 'case_studies') {
            if ($slug) {
                $study = CaseStudy::where('slug', $slug)->where('status', 'published')->first();
                if (!$study) {
                    return response()->json(['success' => false, 'message' => 'Case study not found'], 404);
                }
                return response()->json(['success' => true, 'data' => $study->toViewArray()]);
            }

            $studies = CaseStudy::where('status', 'published')
                ->orderByDesc('published_at')
                ->get()
                ->map(fn(CaseStudy $cs) => $cs->toViewArray());

            return response()->json(['success' => true, 'data' => $studies]);
        }

        return response()->json(['success' => false, 'message' => 'Invalid content type requested'], 400);
    }
}
