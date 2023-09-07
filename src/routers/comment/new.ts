import { Router, Request, Response, NextFunction } from "express";
import Comment from '../../models/comment'
import Post from '../../models/post'

const router = Router()

router.post('/api/:postId/new/comment/', async (req: Request, res: Response, next: NextFunction) => {
    const { userName, content  } = req.body;

    const { postId } = req.params;

    if(!content || postId) {
        const error = new Error('content and postId are required!') as CustomError 
        error.status = 400
        next(error)
    }
    
    const newComment = new Comment({
        userName: userName ? userName : 'anonymous',
        content 
    })

    await newComment.save()

    const updatedPost = await Post.findOneAndUpdate({_id: postId}, { $push: { comments: newComment } }, { new: true })

    res.status(201).send(updatedPost)

})

export { router as newCommentRouter }