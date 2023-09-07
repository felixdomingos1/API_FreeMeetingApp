import { Router, Request, Response, NextFunction } from "express";
import Post from '../../models/post'

const router = Router()

router.post('/api/show/post/:id', async (req: Request, res: Response, next: NextFunction) => {
    const { id } = req.params;

    const result = id ? await Post.findById(id) : await Post.find()

    res.status(201).send(result)

})

export { router as showPostRouter }
