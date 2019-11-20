

function solve() {

  class Post {
    constructor(title, content) {
      this.title = title;
      this.content = content;
    }

    toString() {
      return `Post: ${this.title}\nContent: ${this.content}`
    }
  }

  class SocialMediaPost extends Post {
    constructor(title, content, likes, dislikes) {
      super(title, content)
      this.likes = likes;
      this.dislikes = dislikes;
      this.comments = [];
    }

    addComment(comment) {
      this.comments.push(comment)
    }

    toString() {
      let str = '';
      str += `Post: ${this.title}\nContent: ${this.content}\n`;
      str += `Rating: ${this.likes - this.dislikes}`;
      if (this.comments.length > 0) {
        str += `\nComments:\n`;
        str += this.comments.map(x => ' * '.concat(x)).join('\n');
      }
      return str;
    }
  }

  class BlogPost extends Post {
    constructor(title, content, views) {
      super(title, content)
      this.views = views;
    }

    view() {
      this.views++;
      return this;
    }

    toString() {
      let str = '';
      str += `Post: ${this.title}\n`
      str += `Content: ${this.content}\n`;
      str += `Views: ${this.views}`
      return str;
    }
  }
  return {
    Post, SocialMediaPost, BlogPost
  }
}

let { Post, SocialMediaPost, BlogPost } = solve();


let test = new BlogPost("TestTitle", "TestContent", 5);

test.view().view().view();

console.log(test);