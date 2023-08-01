import React, { useEffect, useState } from "react";

type User = {
    id: number
    name: string
    email: string
}

export default function App() {
    const [users, setUsers] = useState<User[] | null>([])

    useEffect(() => {
        fetch("http://localhost:8000/api/users", {
            headers: {"Content-Type": "application/json"}
        })
            .then(res => res.json())
            .then(data => setUsers(data))
    }, [])

    return (
        <>
            {
                users?.map((user: User) => {
                    return <p key={user.id}>{user.id}. {user.name} ({user.email})</p>
                })
            }
        </>
    )
}
