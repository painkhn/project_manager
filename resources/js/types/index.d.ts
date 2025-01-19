export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
}

export interface Project {
    id: number;
    title: string;
    description: string;
    user: User;
    start_date: string;
    end_date: string;
}

export interface Task {
    id: number;
    title: string;
    description: string;
    project: Project;
    user: User;
    start_date: string;
    end_date: string;
    status: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
};
