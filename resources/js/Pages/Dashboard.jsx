import React from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head, Link } from '@inertiajs/inertia-react';

export default function Dashboard(props) {
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="pb-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <div className="p-6 bg-white text-3xl text-center">Welcome to the Blog app!</div>

                        <Link
                            href={route('posts.index')}
                            className='p-6'
                        >
                            <button
                                type="submit"
                                className="px-6 py-2 font-bold text-white bg-blue-500 "
                            >
                                Manage Posts
                            </button>
                        </Link>


                    </div>
                </div>
            </div>
        </Authenticated>
    );
}
