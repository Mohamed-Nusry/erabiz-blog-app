import React from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Inertia } from "@inertiajs/inertia";
import { Head, usePage, Link } from '@inertiajs/inertia-react';

export default function Dashboard(props) {

    const { posts } = usePage().props

    function deletePost(e) {
        if (confirm("Are you sure want to delete this post?")) {
            Inertia.delete(route("posts.destroy", e.currentTarget.id));
        }
    }

    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
        >
            <Head title="Posts" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">

                        <h1 className="text-3xl text-center pb-2">Posts</h1>

                            <div className="flex items-center justify-between mb-6">
                                <Link
                                    className="px-6 py-2 text-white bg-green-500 rounded-md focus:outline-none"
                                    href={ route("posts.create") }
                                >
                                    Create Post
                                </Link>
                            </div>

                            <table className="table-fixed w-full">
                                <thead>
                                    <tr className="bg-blue-100">
                                        <th className="border px-4 py-2 w-20">ID</th>
                                        <th className="border px-4 py-2">Title</th>
                                        <th className="border px-4 py-2">Body</th>
                                        <th className="border px-4 py-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {posts.map(({ id, title, body }) => (
                                        <tr>
                                            <td className="border px-4 py-2">{ id }</td>
                                            <td className="border px-4 py-2">{ title }</td>
                                            <td className="border px-4 py-2">{ body }</td>
                                            <td className="border px-4 py-2">
                                                <Link
                                                    tabIndex="1"
                                                    className="px-4 py-2 text-sm text-white bg-blue-500 rounded"
                                                    href={route("posts.edit", id)}
                                                >
                                                    Edit
                                                </Link>
                                                <button
                                                    onClick={deletePost}
                                                    id={id}
                                                    tabIndex="-1"
                                                    type="button"
                                                    className="mx-1 px-4 py-2 text-sm text-white bg-red-500 rounded"
                                                >
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    ))}

                                    {posts.length === 0 && (
                                        <tr>
                                            <td
                                                className="px-6 py-4 border-t"
                                                colSpan="4"
                                            >
                                                No posts found.
                                            </td>
                                        </tr>
                                    )}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </Authenticated>
    );
}
